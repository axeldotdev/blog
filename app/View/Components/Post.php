<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Post extends Component
{
    public function __construct(
        public \App\Models\Page|\App\Models\Post $model,
    ) {
    }

    public function render(): View
    {
        return view('components.post');
    }
}
