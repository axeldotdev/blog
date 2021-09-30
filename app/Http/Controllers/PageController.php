<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function uses(): View
    {
        $title = 'Uses';
        $description = 'The list of all my hardware and software setup.';
        $content = file_get_contents(resource_path('pages/uses.md'));

        return view('pages.uses', compact('title', 'description', 'content'));
    }
}
