<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeleponController;
use App\Models\Telepon;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hobi', HobiController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('student', StudentController::class);
Route::resource('telepon', TeleponController::class);
// Route::post('/telepon', [TeleponController::class, 'store'])->name('telepon.store');
// Route::delete('/telepon/{id}', [TeleponController::class, 'destroy'])->name('telepon.destroy');
// Route::get('/telepon/edit', [TeleponController::class, 'edit'])->name('telepon.edit');
// Route::put('/telepon/edit/{id}', [TeleponController::class, 'update'])->name('telepon.update');
