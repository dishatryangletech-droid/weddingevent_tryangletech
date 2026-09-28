<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController as AdminAuthController;
use App\Http\Controllers\Backend\DashboardController as AdminDashboardController;


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


// Admin Routes
Route::get("/login", [AdminAuthController::class, "showLoginForm"])->name("login");
Route::prefix("admin")->group(function () {
    Route::get("/login", [AdminAuthController::class, "showLoginForm"])->name("admin.login");
    Route::post("/login", [AdminAuthController::class, "login"])->name("admin.login.submit");
    Route::post("/logout", [AdminAuthController::class, "logout"])->name("admin.logout");
});

Route::prefix("admin")->middleware("auth")->group(function () {
    Route::get("/", function () { return redirect()->route("admin.dashboard"); });
    Route::get("/dashboard", [AdminDashboardController::class, "index"])->name("admin.dashboard");
    
    // Home Page Settings
    Route::get('/home/banner', [\App\Http\Controllers\Backend\HomeBannerController::class, 'index'])->name('admin.home.banner.index');
    Route::post('/home/banner', [\App\Http\Controllers\Backend\HomeBannerController::class, 'update'])->name('admin.home.banner.update');
    
    // Portfolio Section
    Route::get('/home/portfolio', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'index'])->name('admin.home.portfolio.index');
    Route::post('/home/portfolio/section', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'updateSection'])->name('admin.home.portfolio.section.update');
    
    // Banner Portfolios
    Route::post('/home/portfolio/banner', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'storeBannerPortfolio'])->name('admin.home.portfolio.banner.store');
    Route::delete('/home/portfolio/banner/{id}', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'deleteBannerPortfolio'])->name('admin.home.portfolio.banner.delete');
    Route::post('/home/portfolio/banner/reorder', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'reorderBannerPortfolios'])->name('admin.home.portfolio.banner.reorder');

    // Recommended Portfolios
    Route::post('/home/portfolio/recommended', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'storeRecommendedPortfolio'])->name('admin.home.portfolio.recommended.store');
    Route::delete('/home/portfolio/recommended/{id}', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'deleteRecommendedPortfolio'])->name('admin.home.portfolio.recommended.delete');
    Route::post('/home/portfolio/recommended/reorder', [\App\Http\Controllers\Backend\HomePortfolioController::class, 'reorderRecommendedPortfolios'])->name('admin.home.portfolio.recommended.reorder');
    
    Route::get('/home/about', [\App\Http\Controllers\Backend\HomeAboutController::class, 'index'])->name('admin.home.about.index');
    Route::post('/home/about', [\App\Http\Controllers\Backend\HomeAboutController::class, 'update'])->name('admin.home.about.update');

    Route::get('/home/promise', [\App\Http\Controllers\Backend\HomePromiseController::class, 'index'])->name('admin.home.promise.index');
    Route::post('/home/promise', [\App\Http\Controllers\Backend\HomePromiseController::class, 'update'])->name('admin.home.promise.update');

    Route::get('/home/core-promise', [\App\Http\Controllers\Backend\HomeCorePromiseController::class, 'index'])->name('admin.home.core_promise.index');
    Route::post('/home/core-promise', [\App\Http\Controllers\Backend\HomeCorePromiseController::class, 'update'])->name('admin.home.core_promise.update');

    Route::get('/home/services', [\App\Http\Controllers\Backend\HomeServiceController::class, 'index'])->name('admin.home.services.index');
    Route::post('/home/services/section', [\App\Http\Controllers\Backend\HomeServiceController::class, 'updateSection'])->name('admin.home.services.section.update');
    Route::post('/home/services/card', [\App\Http\Controllers\Backend\HomeServiceController::class, 'storeCard'])->name('admin.home.services.card.store');
    Route::delete('/home/services/card/{id}', [\App\Http\Controllers\Backend\HomeServiceController::class, 'deleteCard'])->name('admin.home.services.card.delete');
    Route::post('/home/services/reorder', [\App\Http\Controllers\Backend\HomeServiceController::class, 'reorderCards'])->name('admin.home.services.reorder');

    Route::get('/home/philosophy', [\App\Http\Controllers\Backend\HomePhilosophyController::class, 'index'])->name('admin.home.philosophy.index');
    Route::post('/home/philosophy/section', [\App\Http\Controllers\Backend\HomePhilosophyController::class, 'updateSection'])->name('admin.home.philosophy.section.update');
    Route::post('/home/philosophy/item', [\App\Http\Controllers\Backend\HomePhilosophyController::class, 'storeItem'])->name('admin.home.philosophy.item.store');
    Route::delete('/home/philosophy/item/{id}', [\App\Http\Controllers\Backend\HomePhilosophyController::class, 'deleteItem'])->name('admin.home.philosophy.item.delete');
    Route::post('/home/philosophy/reorder', [\App\Http\Controllers\Backend\HomePhilosophyController::class, 'reorderItems'])->name('admin.home.philosophy.reorder');

    Route::get('/home/recognitions', [\App\Http\Controllers\Backend\HomeRecognitionsController::class, 'index'])->name('admin.home.recognitions.index');
    Route::post('/home/recognitions/section', [\App\Http\Controllers\Backend\HomeRecognitionsController::class, 'updateSection'])->name('admin.home.recognitions.section.update');
    Route::post('/home/recognitions/item', [\App\Http\Controllers\Backend\HomeRecognitionsController::class, 'storeItem'])->name('admin.home.recognitions.item.store');
    Route::delete('/home/recognitions/item/{id}', [\App\Http\Controllers\Backend\HomeRecognitionsController::class, 'deleteItem'])->name('admin.home.recognitions.item.delete');
    Route::post('/home/recognitions/reorder', [\App\Http\Controllers\Backend\HomeRecognitionsController::class, 'reorderItems'])->name('admin.home.recognitions.reorder');
});
