<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Page
{
    public const PATH = 'pages/';

    public string $title;
    public string $description;
    public string $content;

    public function __construct(string $slug)
    {
        $file = file_get_contents(resource_path(static::PATH . $slug . '.md'));

        $this->title = Str::between($file, 'title: ', PHP_EOL . 'description: ');
        $this->description = Str::between($file, 'description: ', PHP_EOL . '----------');
        $this->content = Str::after($file, '----------' . PHP_EOL);
    }

    public static function all(): Collection
    {
        $pages = new Collection();

        foreach (File::allFiles(resource_path(static::PATH)) as $file) {
            $slug = Str::replace('.md', '', $file->getFilename());
            $pages->push(new static($slug));
        }

        return $pages;
    }
}
