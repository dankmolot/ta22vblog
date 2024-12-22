<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('post', PostController::class);
    Route::post('post/{post}/comment', [PostController::class, 'storeComment'])->name('post.comment');
    Route::delete('post/{post}/comment/{comment}', [PostController::class, 'destroyComment'])->name('post.comment.destroy');

    Route::resource('user', UserController::class);

    Route::resource('tag', TagController::class);
});

require __DIR__.'/auth.php';
