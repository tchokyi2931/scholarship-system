<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScholarshipController;

Route::get('/', function () {
    return view(' ');
});
// Route::resource('dashboard', )
Route::resource('students', StudentController::class);
Route::resource('scholarships', ScholarshipController::class);
