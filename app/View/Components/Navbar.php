<?php

namespace App\View\Components;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    public function render(): View
    {
        return view('components.navbar', ['links' => $this->links()]);
    }

    private function links(): Collection
    {
        $links = new Collection();

        Page::all()->each(fn (Page $page) => $links->push((object) [
            'name' => $page->title,
            'url' => route('pages.show', Str::lower($page->title)),
        ]));

        \App\Models\Post::categories()->each(fn (string $category) => $links->push((object) [
            'name' => $category,
            'url' => route('posts.category', Str::slug($category)),
        ]));

        return $this->homeLink()->merge($links->sortBy('name'));
    }

    private function homeLink(): Collection
    {
        return new Collection([
            (object) [
                'name' => 'Home',
                'url' => route('posts.index'),
            ],
        ]);
    }
}
