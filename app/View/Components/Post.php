<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public function __construct(
        public string $content,
    ) {
    }

    public function render(): View
    {
        return view('components.post');
    }
}
