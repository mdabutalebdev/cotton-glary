<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certification;
use App\Models\Owner;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    /**
     * Public "About Us" page — About block, owner profile, progress + certifications.
     */
    public function index(): View
    {
        return view('about-us', [
            'about' => About::current(),
            'owner' => Owner::current(),
            'certifications' => Certification::activeOrdered(),
        ]);
    }
}
