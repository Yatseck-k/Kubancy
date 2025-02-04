<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Маршруты для аутентификации
Route::view('/', 'welcome'); // Главная страница

Route::middleware(['auth', 'verified'])->group(function () {
    // Страница с постами
    Route::get('dashboard', [PostController::class, 'index'])->name('dashboard');

    // Страница профиля пользователя
    Route::view('profile', 'profile')->name('profile');

    // Маршруты для создания и отображения постов
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});

require __DIR__ . '/auth.php';
