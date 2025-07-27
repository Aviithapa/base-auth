<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;
use App\Notifications\Auth\RegistrationNotification;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login form submission securely.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $remember = $request->filled('remember');

        // Determine login field type
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Create throttle key by combining login and IP
        $throttleKey = Str::lower($login) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()
                ->withErrors([
                    'login' => "Too many login attempts. Please try again in $seconds seconds.",
                ])
                ->onlyInput('login');
        }

        // Attempt to authenticate with dynamic field
        if (Auth::attempt([$field => $login, 'password' => $password], $remember)) {
            $request->session()->regenerate(); // Prevent session fixation
            RateLimiter::clear($throttleKey); // Clear throttle on success
            return redirect()->intended('/dashboard');
        }

        // Increment login attempts
        RateLimiter::hit($throttleKey, 60); // Lockout for 60 seconds

        return back()
            ->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('login');
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view('auth.registration');
    }

    /**
     * Handle registration securely.
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $otp = random_int(10000, 99999); // 5-digit OTP
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'email_verification_token' => $request->email ? $otp : null,
                'phone_otp' => $otp,
                'is_phone_verified' => false,
            ]);

            $user->assignRole('user');

            $user->notify(new RegistrationNotification($user));

            DB::commit();

            session(['otp_user_id' => $user->id]);

            return redirect()->route('auth.otp')->with('status', 'Registered! Please verify your email and phone.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withErrors(['registration' => 'Registration failed, please try again.'])
                ->withInput();
        }
    }

    public function showOtpForm()
    {
        return view('auth.otp-verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:5',
        ]);

        $userId = session('otp_user_id');

        if (!$userId) {
            return redirect()
                ->route('login')
                ->withErrors(['otp' => 'Session expired. Please login again.']);
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()
                ->route('login')
                ->withErrors(['otp' => 'User not found.']);
        }


        if ($user->email_verification_token !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        // Mark as verified
        $user->update([
            'is_phone_verified' => true,
            'email_verification_token' => null, // clear OTP
            'phone_otp' => null, // clear OTP
            'email_verified_at' => now(), // optional if also verifying email
        ]);

        Auth::login($user); // Log user in

        session()->forget('otp_user_id'); // Clean session

        return redirect()->route('dashboard')->with('success', 'Welcome, your account is verified.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // CSRF token regeneration
        return redirect('/auth/login');
    }
}
