<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
Route::get('/categories/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('/{slug}', [PostController::class, 'show'])->name('posts.show');
