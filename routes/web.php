<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

// Route::get('/', function () {return view('welcome'); });

Route::get('/', fn() => redirect()->route('pets.index'));

// CRUD routes for pets
Route::resource('pets', PetController::class);
