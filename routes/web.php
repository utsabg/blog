<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
})->name('home');
Route::get('/dashboard', function () {
    return view('home');
})->name('dashboard')->middleware('auth');

Auth::routes();
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{id}', [PostController::class,'show'])->name('post.show');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('post.delete');

Route::resource('photos',PhotoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
