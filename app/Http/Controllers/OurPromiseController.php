<?php

namespace App\Http\Controllers;

use App\Models\Promise;
use Illuminate\View\View;

class OurPromiseController extends Controller
{
    public function index(): View
    {
        return view('our-promise', ['promise' => Promise::current()]);
    }
}
