<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'title' => Post::INDEX_TITLE,
            'description' => Post::INDEX_DESCRIPTION,
            'posts' => Post::all(),
        ]);
    }

    public function show(string $slug): View
    {
        return view('posts.show', ['post' => new Post($slug)]);
    }

    public function category(string $slug): View
    {
        return view('posts.index', [
            'title' => Str::title($slug),
            'description' => Post::INDEX_DESCRIPTION,
            'posts' => Post::category($slug),
        ]);
    }
}
