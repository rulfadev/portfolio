<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

Route::get('/card', function () {
    return view('card');
});
Route::get('/', [ArticleController::class, 'index'])->name('landing');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles');
