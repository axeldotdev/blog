<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(): View
    {
        $title = 'All My Blog Posts';
        $description = '';
        $posts = $this->getPosts();

        return view('posts.index', compact('title', 'description', 'posts'));
    }

    public function show(string $post_slug): View
    {
        $path = resource_path('posts/' . $post_slug . '.md');

        if (! File::exists($path)) {
            abort(404);
        }

        $post = file_get_contents($path);
        $title = '';
        $description = '';

        return view('posts.show', compact('title', 'description', 'content'));
    }

    private function getPosts(): Collection
    {
        $posts = new Collection();

        foreach ([] as $post) {
            $posts->push($post);
        }

        return $posts;
    }
}
