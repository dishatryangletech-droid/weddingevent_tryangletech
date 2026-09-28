<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard overview.
     */
    public function index()
    {
        $stats = [
            'total_slides' => 0,
            'active_slides' => 0,
            'total_users' => User::count(),
            'total_services' => 0,
        ];

        $recentSliders = collect([]);

        return view('backend.dashboard', compact('stats', 'recentSliders'));
    }
}
