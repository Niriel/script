<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\Comment;

Route::get('/articles',                [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create',         [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles',               [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}',      [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}',      [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}',   [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::post('/comments',               [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::delete('/comments/{comment}',   [CommentController::class, 'destroy'])->middleware('auth')->can('can:delete', Comment::class)->name('comments.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout.perform');

Route::redirect('/', '/articles');
