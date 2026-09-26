<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Knotcraft Laravel Frontend Routes
*/

// Home Pages
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/home-two', [FrontendController::class, 'homeTwo'])->name('home-two');
Route::get('/home-three', [FrontendController::class, 'homeThree'])->name('home-three');

// About
Route::get('/about', [FrontendController::class, 'about'])->name('about');

// Services
Route::prefix('services')->group(function () {
    Route::get('/service-one', [FrontendController::class, 'serviceOne'])->name('service-one');
    Route::get('/service-two', [FrontendController::class, 'serviceTwo'])->name('service-two');
    Route::get('/service-three', [FrontendController::class, 'serviceThree'])->name('service-three');
});
// Fallback direct routes to match original links if needed
Route::get('/service-one', [FrontendController::class, 'serviceOne']);
Route::get('/service-two', [FrontendController::class, 'serviceTwo']);
Route::get('/service-three', [FrontendController::class, 'serviceThree']);

// Packages
Route::prefix('packages')->group(function () {
    Route::get('/classic', [FrontendController::class, 'classicPackage'])->name('classic-package');
    Route::get('/elegance', [FrontendController::class, 'elegancePackage'])->name('elegance-package');
    Route::get('/luxury', [FrontendController::class, 'luxuryPackage'])->name('luxury-package');
});
// Fallback direct routes
Route::get('/classic-package', [FrontendController::class, 'classicPackage']);
Route::get('/elegance-package', [FrontendController::class, 'elegancePackage']);
Route::get('/luxury-package', [FrontendController::class, 'luxuryPackage']);

// Booking Inquiry
Route::get('/booking-inquiry', [FrontendController::class, 'bookingInquiry'])->name('booking-inquiry');

// Venues
Route::get('/venue', [FrontendController::class, 'venue'])->name('venue');
Route::get('/venue-detail/{slug}', [FrontendController::class, 'venueDetail'])->name('venue.detail');
Route::get('/venue/{slug}', [FrontendController::class, 'venueDetail']);

// Events
Route::get('/event', [FrontendController::class, 'event'])->name('event');
Route::get('/event/{slug}', [FrontendController::class, 'eventDetail'])->name('event.detail');

// Portfolio
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [FrontendController::class, 'portfolioDetail'])->name('portfolio.detail');

// Blog
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-post/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetail']);

// Contact
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// Utility / Template Documentation Pages
Route::get('/style-guide', [FrontendController::class, 'styleGuide'])->name('style-guide');
Route::get('/licenses', [FrontendController::class, 'licenses'])->name('licenses');
Route::get('/changelog', [FrontendController::class, 'changelog'])->name('changelog');
Route::get('/instructions', [FrontendController::class, 'instructions'])->name('instructions');
Route::get('/401', [FrontendController::class, 'passwordProtected'])->name('password-protected');
