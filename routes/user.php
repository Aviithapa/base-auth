<?php

use App\Http\Controllers\Portal\User\ProfileController;
use App\Http\Controllers\Portal\User\TrainingFormController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_user'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/training-forms', [TrainingFormController::class, 'index'])->name('user.training-form.index');
        Route::get('/training-forms/{training_form}', [TrainingFormController::class, 'show'])->name('user.training-form.show');
        Route::post('/training-forms', [TrainingFormController::class, 'store'])->name('user.training-form.store');
        Route::get('/training-forms/{training_form}/apply', [TrainingFormController::class, 'apply'])->name('user.training-form.apply');
        Route::put('/training-form/{id}/update', [TrainingFormController::class, 'update'])->name('user.training-form.update');

        Route::get('profile', [ProfileController::class, 'index'])->name('user.profile.index');
        Route::put('user-update', [ProfileController::class, 'update'])->name('user.update');
        Route::put('user-update-password', [ProfileController::class, 'updatePassword'])->name('user.change.password');
        Route::put('user-update-profile', [ProfileController::class, 'updateProfile'])->name('user.update.profile');
    });
