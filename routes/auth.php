<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotController;
use Illuminate\Support\Facades\Route;

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('auth')
    ->middleware('redirect.authenticated')
    ->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', 'showLogin')->name('login');
            Route::post('/login', 'login')->name('auth.login.submit')->middleware('throttle:5,1');

            Route::get('/sign-up', 'showRegister')->name('auth.register');
            Route::post('/sign-up', 'register')->name('auth.register.submit')->middleware('throttle:5,1');

            Route::get('/otp-verify', 'showOtpForm')->name('auth.otp');
            Route::post('/otp-verify', 'verifyOtp')->name('auth.otp.verify')->middleware('throttle:5,1');

            Route::get('/otp/resend', 'resendOtp')->name('auth.otp.resend')->middleware('throttle:3,1');
        });

        Route::prefix('forgot-password')
            ->controller(ForgotController::class)
            ->group(function () {
                Route::get('/', 'showForgotForm')->name('auth.forgot');
                Route::post('/', 'sendResetLink')->name('password.forgot');

                Route::get('/otp-verify', 'showOtpForm')->name('forgot.otp');
                Route::post('/otp-verify', 'submitOtp')->name('forgot.otp.submit');

                Route::get('/confirm-password', 'showConfirmPasswordForm')->name('auth.confirm');
                Route::post('/confirm-password', 'confirmPassword')->name('auth.confirm.submit');
            });
    });
