<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('experiences', ExperienceController::class);

Route::resource('languages', LanguageController::class);

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
