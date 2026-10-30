<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Admin dashboard.
     */
    public function admin(): View
    {
        return view('admin.dashboard', [
            'totalBanners' => Banner::count(),
            'activeBanner' => Banner::active(),
            'totalUsers' => User::count(),
        ]);
    }

    /**
     * Regular user dashboard.
     */
    public function user(): View
    {
        return view('user.dashboard');
    }
}
