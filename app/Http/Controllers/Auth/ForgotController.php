<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForgotController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $input = $request->input('identifier');

        // Check for email
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $input)->first();
        } else {
            $user = User::where('phone', $input)->first();
        }

        if (!$user) {
            return back()
                ->withErrors(['identifier' => 'No user found with that email or phone.'])
                ->withInput();
        }

        // Generate a 5-digit OTP
        $otp = random_int(10000, 99999);

        // Store it temporarily (e.g. in cache or a DB column)
        $user->phone_otp = $otp;
        // $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        // Send via notification
        $user->notify(new ResetPasswordNotification($user));
        session(['forgot_otp_user_id' => $user->id]);

        return redirect()->route('forgot.otp')->with('status', 'We sent a reset code to your contact.');
    }

    public function showOtpForm()
    {
        return view('auth.forgot-otp-verify');
    }

    public function submitOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:5',
        ]);

        $userId = session('forgot_otp_user_id');

        if (!$userId) {
            return redirect()
                ->route('auth.forgot')
                ->withErrors(['otp' => 'Session expired. Please request a new OTP.']);
        }

        $user = User::find($userId);

        if (!$user || $user->phone_otp !== $request->otp) {
            return back()
                ->withErrors(['otp' => 'Invalid or expired OTP.'])
                ->withInput();
        }

        // OTP is valid, proceed to reset password
        return redirect()->route('auth.confirm')->with('status', 'OTP verified successfully. Please set a new password.');
    }

    public function showConfirmPasswordForm()
    {
        return view('auth.confirm-password');
    }

    public function confirmPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $userId = session('forgot_otp_user_id');

        if (!$userId) {
            return redirect()
                ->route('auth.forgot')
                ->withErrors(['password' => 'Session expired. Please request a new OTP.']);
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()
                ->route('auth.forgot')
                ->withErrors(['password' => 'User not found.']);
        }

        // Update the user's password
        $user->password = bcrypt($request->password);
        $user->phone_otp = null; // Clear OTP after successful reset
        $user->save();

        Auth::login($user); // Log user in

        session()->forget('forgot_otp_user_id'); // Clean session

        return redirect()->route('dashboard')->with('success', 'Welcome, your account is verified.');
    }
}
