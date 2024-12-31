<?php

use App\Http\Controllers\HobiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hobi', HobiController::class);
