<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use Laravel\Sanctum\Sanctum;

Route::post('/login', [AuthController::class,'login']);
Route::get('/post', [PostController::class,'index']);
Route::get('/user', [UserController::class,'index'])->middleware('auth:sanctum');
Route::get('/post/{id}', [PostController::class, 'show']);

// Route::get('/user', function (Request $request) {
//     dd(User::All());
//     return $request->user();
// });//->middleware('auth:sanctum')
