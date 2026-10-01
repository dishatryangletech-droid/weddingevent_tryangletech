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
            'total_users' => User::count(),
            'total_services' => \App\Models\ServiceOfferItem::count(),
            'total_portfolios' => \App\Models\PortfolioItem::count(),
            'total_events' => \App\Models\EventPageItem::count(),
            'total_blogs' => \App\Models\BlogItem::count(),
            'total_testimonials' => \App\Models\Testimonial::count(),
            'total_contact_enquiries' => \App\Models\ContactEnquiry::count(),
            'total_quote_requests' => \App\Models\Quote::count(),
        ];

        return view('backend.dashboard', compact('stats'));
    }
}
