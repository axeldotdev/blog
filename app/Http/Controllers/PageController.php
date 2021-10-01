<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        return view('pages.show', ['page' => new Page($slug)]);
    }
}
