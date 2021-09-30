<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/uses', [PageController::class, 'uses'])->name('pages.uses');
Route::get('/{post_slug}', [PostController::class, 'show'])->name('posts.show');
