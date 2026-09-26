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

// About
Route::get('/about', [FrontendController::class, 'about'])->name('about');

// Services
Route::get('/service', [FrontendController::class, 'serviceThree'])->name('service-three');

// Booking Inquiry
Route::get('/booking-inquiry', [FrontendController::class, 'bookingInquiry'])->name('booking-inquiry');

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
// Route::get('/style-guide', [FrontendController::class, 'styleGuide'])->name('style-guide');
// Route::get('/licenses', [FrontendController::class, 'licenses'])->name('licenses');
// Route::get('/changelog', [FrontendController::class, 'changelog'])->name('changelog');
// Route::get('/instructions', [FrontendController::class, 'instructions'])->name('instructions');
// Route::get('/401', [FrontendController::class, 'passwordProtected'])->name('password-protected');
