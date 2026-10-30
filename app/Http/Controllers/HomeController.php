<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the public landing page with the active hero banner.
     */
    public function index(): View
    {
        return view('welcome', [
            'banner' => Banner::active(),
            'about' => About::current(),
        ]);
    }
}
