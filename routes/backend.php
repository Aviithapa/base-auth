<?php

use App\Http\Controllers\Portal\ApplicationController;
use App\Http\Controllers\Portal\ApplicationsController;
use App\Http\Controllers\Portal\DashboardController;
use App\Http\Controllers\Portal\NpcTrainingFormController;
use App\Http\Controllers\Portal\TrainingParticipationForm;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/training-participation-form', [TrainingParticipationForm::class, 'index'])->name('training.participation.form');
    Route::post('/npc-training-form', [NpcTrainingFormController::class, 'store'])->name('npc-training-form.store');

    Route::resource('/training-form', NpcTrainingFormController::class)->names([
        'index' => 'training-form.index',
        'create' => 'training-form.create',
        'store' => 'training-form.store',
        'show' => 'training-form.show',
        'edit' => 'training-form.edit',
        'update' => 'training-form.update',
        'destroy' => 'training-form.destroy',
    ]);

    Route::resource('/application', ApplicationController::class)->names([
        'index' => 'application.index',
        'create' => 'application.create',
        'store' => 'application.store',
        'show' => 'application.show',
        'edit' => 'application.edit',
        'update' => 'application.update',
        'destroy' => 'application.destroy',
    ]);
});


