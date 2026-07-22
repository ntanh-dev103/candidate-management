<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateActivationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CandidateExportController;

// ==========================================
// DASHBOARD
// ==========================================

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


// ==========================================
// CANDIDATE CRUD
// ==========================================

Route::prefix('candidates')
    ->name('candidates.')
    ->group(function () {

        // Upload CV
        Route::post(
            '/upload/cv',
            [CandidateController::class, 'uploadCv']
        )->name('upload-cv');

        // Danh sách Candidate
        Route::get(
            '/',
            [CandidateController::class, 'index']
        )->name('index');

        // Form thêm Candidate
        Route::get(
            '/add',
            [CandidateController::class, 'create']
        )->name('create');

        // Lưu Candidate
        Route::post(
            '/store',
            [CandidateController::class, 'store']
        )->name('store');

        // Form sửa Candidate
        Route::get(
            '/edit/{candidate}',
            [CandidateController::class, 'edit']
        )->name('edit');

        // Update Candidate
        Route::put(
            '/update/{candidate}',
            [CandidateController::class, 'update']
        )->name('update');

        // Xóa Candidate
        Route::delete(
            '/delete/{candidate}',
            [CandidateController::class, 'destroy']
        )->name('destroy');

        // Chi tiết Candidate
        Route::get(
            '/show/{candidate}',
            [CandidateController::class, 'show']
        )->name('show');


        Route::get(
            '/export',
            [CandidateController::class, 'export']
        )->name('export');
    });


// ==========================================
// EXPERIENCE CRUD
// ==========================================

Route::resource(
    'experiences',
    ExperienceController::class
);


// ==========================================
// EDUCATION CRUD
// ==========================================

Route::resource(
    'educations',
    EducationController::class
);


// ==========================================
// SKILL CRUD
// ==========================================

Route::resource(
    'skills',
    SkillController::class
);


// ==========================================
// CANDIDATE ACTIVATION
// ==========================================

Route::get(
    '/candidates/activate/{candidate}',
    CandidateActivationController::class
)
    ->middleware('signed')
    ->name('candidates.activate');


    Route::post(
    '/import',
    [CandidateController::class, 'import']
)->name('import');
