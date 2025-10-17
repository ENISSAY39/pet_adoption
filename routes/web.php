<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', function () {
    return redirect()->route('pets.index');
});

Route::resource('pets', PetController::class);
