<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

require __DIR__ . '/auth.php';

Route::view('/', 'welcome');

// Authenticated and verified routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{post}', [PostController::class, 'show'])->name('show');
    });
});
