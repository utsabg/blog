<?php

use App\Models\Post;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Symfony\Component\HttpFoundation\Response;


Auth::routes();
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
})->name('home');

Route::get('/allposts', function () {
        return view('allpost');
})->name('allpost');

Route::get('/dashboard', function () {
    $posts = Post::with('user')->paginate(10);

    return view('home', compact('posts'));
})->name('dashboard')->middleware('auth');

// Routes for common actions
Route::group(['middleware' => ['auth',]], function () {
    Route::resource('posts', PostController::class);
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


});

// Routes for admins
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth',CheckRole::class]], function () {
    Route::resource('users', UserController::class);
});

Auth::routes();

