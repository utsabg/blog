<?php

use App\Models\Post;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use MongoDB\Laravel\Auth\User;
use Symfony\Component\HttpFoundation\Response;

Route::get('/user', [UserController::class, 'index']);

Route::get('/apiposts', function () {

   dd(User::all());

});
