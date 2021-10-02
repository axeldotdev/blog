<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Post
{
    public const PATH = 'posts/';

    public const INDEX_TITLE = 'All My Blog Posts';
    public const INDEX_DESCRIPTION = '';

    public string $title;
    public string $description;
    public string $category;
    public string $content;

    public function __construct(string $slug)
    {
        $file = file_get_contents(resource_path(static::PATH . $slug . '.md'));

        $this->title = Str::between($file, 'title: ', PHP_EOL . 'description: ');
        $this->description = Str::between($file, 'description: ', PHP_EOL . 'category: ');
        $this->category = Str::between($file, 'category: ', PHP_EOL . 'published_at: ');
        $this->published_at = Str::between($file, 'published_at: ', PHP_EOL . '----------');
        $this->content = Str::after($file, '----------' . PHP_EOL);
    }

    public function isPublished(): bool
    {
        return $this->published_at !== 'draft';
    }

    public static function all(): Collection
    {
        $posts = new Collection();

        foreach (File::allFiles(resource_path(static::PATH)) as $file) {
            $slug = Str::replace('.md', '', $file->getFilename());
            $post = new static($slug);

            if ($post->isPublished()) {
                $posts->push($post);
            }
        }

        return $posts->sortByDesc('published_at');
    }

    public static function categories(): Collection
    {
        return static::all()->pluck('category')->unique();
    }

    public static function category(string $slug): Collection
    {
        return static::all()
            ->filter(fn (Post $post) => Str::slug($post->category) === $slug);
    }
}
