<?php

use App\Http\Controllers\HobiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hobi', HobiController::class);
Route::resource('siswa', SiswaController::class);
