<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('pets', PetController::class);
