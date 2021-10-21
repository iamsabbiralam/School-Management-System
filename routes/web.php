<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentImportController;
use App\Http\Controllers\MarkImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subjects', SubjectController::class);
Route::resource('students', StudentController::class);
Route::get('total', [StudentController::class, 'student'])->name('student.total');
Route::get('totalstudent/{id}', [StudentController::class, 'total'])->name('student.totalclass');
Route::resource('results', ResultController::class);
Route::get('getclassid/{id}',[ResultController::class, 'getClassId']);
Route::resource('classes', StudentClassController::class);
Route::resource('imports', StudentImportController::class);
Route::resource('markimports', MarkImportController::class);
