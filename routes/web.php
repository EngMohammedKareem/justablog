<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('posts.comments', CommentController::class)->middleware('auth');
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
