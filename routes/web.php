<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::resource('photos',PhotoController::class);
