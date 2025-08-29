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
use Carbon\Carbon;
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

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $throttleKey = Str::lower($login) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()
                ->withErrors([
                    'login' => "Too many login attempts. Please try again in $seconds seconds.",
                ])
                ->onlyInput('login');
        }

        if (Auth::attempt([$field => $login, 'password' => $password], $remember)) {
            $user = Auth::user();

            if ($user->status !== 'active') {
                $otp = random_int(10000, 99999);
                $user->update([
                    'email_verification_token' => $otp,
                    'phone_otp' => $otp,
                    'last_otp_sent_at' => now('UTC'),
                ]);
                $user->notify(new RegistrationNotification($user));

                session(['otp_user_id' => $user->id]);

                Auth::logout(); // Don’t keep them logged in yet

                return redirect()->route('auth.otp')->with('status', 'Your account is not activated. A new OTP has been sent to verify your account.');
            }

            $request->session()->regenerate();
            RateLimiter::clear($throttleKey);

            return redirect()->intended('/dashboard');
        }

        RateLimiter::hit($throttleKey, 60);

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
            // Get validated data except password
            $data = $request->safe()->except(['password']);
            $data['password'] = Hash::make($request->password);

            // Generate OTP
            $otp = random_int(10000, 99999);
            $data['email_verification_token'] = $request->filled('email') ? $otp : null;
            $data['phone_otp'] = $otp;
            $data['is_phone_verified'] = false;
            $data['last_otp_sent_at'] = now('UTC'); // ✅ Store in UTC
            $data['status'] = 'inactive';

            // Create user
            $user = User::create($data);

            if ($data['role'] === 'Expert') {
                $user->assignRole('expert');
            } else {
                $user->assignRole('user');
            }

            // Send notification
            $user->notify(new RegistrationNotification($user));

            DB::commit();

            // Store user ID for OTP verification
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
            'status' => 'active',
        ]);

        Auth::login($user); // Log user in

        session()->forget('otp_user_id'); // Clean session

        return redirect()->route('dashboard')->with('success', 'Welcome, your account is verified.');
    }

    public function resendOtp()
    {
        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()
                ->route('auth.register')
                ->withErrors(['otp' => 'No user session found.']);
        }

        $user = User::findOrFail($userId);
        $nowUtc = Carbon::now('UTC');

        // Ensure both times are UTC
        $lastSentAtUtc = $user->last_otp_sent_at ? Carbon::parse($user->last_otp_sent_at)->setTimezone('UTC') : null;

        if ($lastSentAtUtc && $lastSentAtUtc->diffInRealSeconds($nowUtc) < 120) {
            $secondsLeft = 120 - $lastSentAtUtc->diffInRealSeconds($nowUtc);
            return back()->withErrors([
                'otp' => "Please wait {$secondsLeft} seconds before resending.",
            ]);
        }

        $otp = random_int(10000, 99999);
        $user->update([
            'email_verification_token' => $otp,
            'phone_otp' => $otp,
            'last_otp_sent_at' => $nowUtc,
        ]);

        $user->notify(new RegistrationNotification($user));

        return back()->with('status', 'OTP resent successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // CSRF token regeneration
        return redirect('/auth/login');
    }
}
