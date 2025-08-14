<?php

use App\Http\Controllers\Portal\Admin\NpcTrainingFormController;
use App\Http\Controllers\Portal\Admin\ApplicationController;
use App\Http\Controllers\Portal\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::middleware(['is_admin'])->group(function () {
            Route::resource('/training-form', NpcTrainingFormController::class);
            Route::resource('/application', ApplicationController::class);
            Route::get('/training-forms/{id}/export-applicants', [NpcTrainingFormController::class, 'exportApplicants'])->name('training-form.export');
            Route::post('/training-form/{id}/upload-document', [NpcTrainingFormController::class, 'uploadDocument'])->name('training-form.document.upload');
            Route::delete('/training-form/document/{media}', [NpcTrainingFormController::class, 'deleteDocument'])->name('training-form.document.delete');
            Route::post('/training-form/{id}/approve', [NpcTrainingFormController::class, 'approve'])->name('training-form.approve');
            Route::post('/training-form/{id}/reject', [NpcTrainingFormController::class, 'reject'])->name('training-form.reject');
            Route::get('/training-forms/{id}/download/{user_id}', [NpcTrainingFormController::class, 'downloadPdf'])->name('training-forms.download');
            Route::get('/training-forms/{id}/certificate/{user_id}', [NpcTrainingFormController::class, 'downloadCertificate'])->name('training-forms.certificate');
        });

    });
