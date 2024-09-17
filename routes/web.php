<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->middleware('auth');
    Route::resource('posts.comments', CommentController::class);
    Route::resource('posts.comments.replies', ReplyController::class);
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/report', [PostController::class, 'report'])->name('posts.report');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::post('/users/{username}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{username}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::delete('/notifications', [NotificationsController::class, 'destroy'])->name('notifications.destroy');
});
Route::get('/users/{username}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');
Route::get('/users/{user}/following', [UserController::class, 'following'])->name('users.following');
// Route::resource('posts', PostController::class)->middleware('auth');
// Route::resource('posts.comments', CommentController::class)->middleware('auth');
// Route::resource('posts.comments.replies', ReplyController::class)->middleware('auth');
// Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like')->middleware('auth');
// Route::post('/posts/{post}/report', [PostController::class, 'report'])->name('posts.report')->middleware('auth');
// Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow')->middleware('auth');
// Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');
// Route::get('/users/{user}/followers', [UserController::class, 'followers'])->name('users.followers');
// Route::get('/users/{user}/following', [UserController::class, 'following'])->name('users.following');
Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.redirect');

Route::get('/auth/callback', function () {
    $githubuser = Socialite::driver('github')->user();
    $user = User::firstOrCreate([
        'name' => $githubuser->name,
        'email' => $githubuser->email,
        'username' => $githubuser->nickname
    ]);

    Auth::login($user);
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
