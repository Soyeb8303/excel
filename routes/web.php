<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StudentController;

Route::get('/',[StudentController::class,'index'])->name('students.index');

Route::post('/store',[StudentController::class,'store'])->name('students.store');

Route::get('/export',[StudentController::class,'export'])->name('students.export');

Route::post('/import',[StudentController::class,'import'])
    ->name('students.import');