<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/sign-up', function () {
    return view('auth.registration');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/otp-verify', function () {
    return view('auth.otp-verify');
});



Route::get('/confirm-password', function () {
    return view('auth.confirm-password');
});
