<?php

use App\Http\Controllers\Portal\TrainingParticipationForm;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('portal.dashbaord.default');
    })->name('dashboard');

    Route::get('/training-participation-form', [TrainingParticipationForm::class, 'index'])->name('training.participation.form');
});


