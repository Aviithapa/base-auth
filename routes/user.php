<?php

use App\Http\Controllers\Portal\User\TrainingFormController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_user'])
    ->prefix('dashboard/user')
    ->group(function () {
        Route::get('/training-forms', [TrainingFormController::class, 'index'])->name('user.training-form.index');
        Route::get('/training-forms/{training_form}', [TrainingFormController::class, 'show'])->name('user.training-form.show');
        Route::post('/training-forms', [TrainingFormController::class, 'store'])->name('user.training-form.store');
        Route::get('/training-forms/{training_form}/apply', [TrainingFormController::class, 'apply'])->name('user.training-form.apply');
        Route::put('/training-form/{id}/update', [TrainingFormController::class, 'update'])->name('user.training-form.update');
    });
