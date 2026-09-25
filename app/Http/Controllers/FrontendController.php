<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * Home One (Default)
     */
    public function home(): View
    {
        return view('frontend.home');
    }

    /**
     * Home Two
     */
    public function homeTwo(): View
    {
        return view('frontend.home-two');
    }

    /**
     * Home Three
     */
    public function homeThree(): View
    {
        return view('frontend.home-three');
    }

    /**
     * About Page
     */
    public function about(): View
    {
        return view('frontend.about');
    }

    /**
     * Services
     */
    public function serviceOne(): View
    {
        return view('frontend.service-one');
    }

    public function serviceTwo(): View
    {
        return view('frontend.service-two');
    }

    public function serviceThree(): View
    {
        return view('frontend.service-three');
    }

    /**
     * Packages
     */
    public function classicPackage(): View
    {
        return view('frontend.classic-package');
    }

    public function elegancePackage(): View
    {
        return view('frontend.elegance-package');
    }

    public function luxuryPackage(): View
    {
        return view('frontend.luxury-package');
    }

    /**
     * Booking Inquiry
     */
    public function bookingInquiry(): View
    {
        return view('frontend.booking-inquiry');
    }

    /**
     * Venues List & Detail
     */
    public function venue(): View
    {
        return view('frontend.venue');
    }

    public function venueDetail(string $slug): View
    {
        $viewName = "frontend.venue-detail.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }

        abort(404);
    }

    /**
     * Events List & Detail
     */
    public function event(): View
    {
        return view('frontend.event');
    }

    public function eventDetail(string $slug): View
    {
        $viewName = "frontend.event.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }

        abort(404);
    }

    /**
     * Blog List & Detail
     */
    public function blog(): View
    {
        return view('frontend.blog');
    }

    public function blogDetail(string $slug): View
    {
        $viewName = "frontend.blog-post.{$slug}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }

        abort(404);
    }

    /**
     * Contact
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }

    /**
     * Template utility pages
     */
    public function styleGuide(): View
    {
        return view('frontend.style-guide');
    }

    public function licenses(): View
    {
        return view('frontend.licenses');
    }

    public function changelog(): View
    {
        return view('frontend.changelog');
    }

    public function instructions(): View
    {
        return view('frontend.instructions');
    }

    public function passwordProtected(): View
    {
        return view('frontend.401');
    }
}
