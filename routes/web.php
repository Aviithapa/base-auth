<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/backend.php';

// Home route
Route::get('/', function () {
    return redirect()->route('login');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
