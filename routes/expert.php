<?php

use App\Http\Controllers\Portal\Expert\ExpertDetailController;
use App\Http\Controllers\Portal\Expert\ProfileController;
use App\Http\Controllers\Portal\Expert\TrainingFormController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_expert'])
    ->prefix('dashboard')
    ->name('expert.')
    ->group(function () {
        Route::get('/expert/training-forms', [TrainingFormController::class, 'index'])->name('training-form.index');
        Route::get('/expert/training-forms/{training_form}', [TrainingFormController::class, 'show'])->name('training-form.show');
        Route::post('/expert/training-forms', [TrainingFormController::class, 'store'])->name('training-form.store');
        Route::get('/expert/training-forms/{training_form}/apply', [TrainingFormController::class, 'apply'])->name('training-form.apply');
        Route::put('/expert/training-form/{id}/update', [TrainingFormController::class, 'update'])->name('training-form.update');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('expert-update', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('expert-update-password', [ProfileController::class, 'updatePassword'])->name('profile.change.password');
        Route::put('expert-update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update.profile');

        Route::resource('expert', ExpertDetailController::class)->only('index', 'create', 'store', 'update', 'destroy');
    });
