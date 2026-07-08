<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateActivationController;

// Trang chủ
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::prefix('candidates')->name('candidates.')->group(function () {

    // Upload CV async
    Route::post('/upload/cv', [CandidateController::class, 'uploadCv'])->name('upload-cv');

    // Danh sách ứng viên
    Route::get('/', [CandidateController::class, 'index'])->name('index');

    // Form thêm
    Route::get('/add', [CandidateController::class, 'create'])->name('create');

    // Lưu dữ liệu
    Route::post('/store', [CandidateController::class, 'store'])->name('store');

    // Form sửa
    Route::get('/edit/{candidate}', [CandidateController::class, 'edit'])->name('edit');

    // Cập nhật
    Route::put('/update/{candidate}', [CandidateController::class, 'update'])->name('update');

    // Xóa
    Route::delete('/delete/{candidate}', [CandidateController::class, 'destroy'])->name('destroy');

    // Chi tiết (nếu cần)
    Route::get('/show/{candidate}', [CandidateController::class, 'show'])->name('show');
});

Route::get('/test-view', function () {
    return view('candidates.index');
});

Route::get('/candidates/activate/{candidate}', CandidateActivationController::class)
    ->middleware('signed')
    ->name('candidates.activate');
