<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/articles',           [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/login',              [AuthController::class,    'loginPage'])->name('auth.loginPage');
Route::post('/login',             [AuthController::class,    'login'])->name('auth.login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/articles/create',         [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles',               [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}',      [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}',   [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::post('/comments',               [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}',   [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::redirect('/', '/articles');
