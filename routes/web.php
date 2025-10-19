<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/pets/stats', [PetController::class, 'stats'])->name('pets.stats');
Route::resource('pets', PetController::class);

