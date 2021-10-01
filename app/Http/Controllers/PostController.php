<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
}
