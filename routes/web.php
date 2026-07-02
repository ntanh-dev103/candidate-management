<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('candidates', CandidateController::class);
Route::get('/test-view', function () {
    return view('candidates.index');
});