<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function uses(): View
    {
        return view('pages.show', ['page' => new Page('uses')]);
    }

    public function about(): View
    {
        return view('pages.show', ['page' => new Page('about')]);
    }
}
