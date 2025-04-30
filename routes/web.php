<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;

Route::get('/card', function () {
    return view('card');
});
Route::get('/', [LandingController::class, 'index'])->name('landing');
