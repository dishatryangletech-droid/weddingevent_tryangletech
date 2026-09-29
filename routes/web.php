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
Route::get('/services', [FrontendController::class, 'serviceThree'])->name('services');

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

    // About Us Page Settings
    Route::get('/about/banner', [\App\Http\Controllers\Backend\AboutBannerController::class, 'index'])->name('admin.about.banner.index');
    Route::post('/about/banner', [\App\Http\Controllers\Backend\AboutBannerController::class, 'update'])->name('admin.about.banner.update');

    Route::get('/about/story', [\App\Http\Controllers\Backend\AboutStoryController::class, 'index'])->name('admin.about.story.index');
    Route::post('/about/story', [\App\Http\Controllers\Backend\AboutStoryController::class, 'update'])->name('admin.about.story.update');

    Route::get('/about/mission', [\App\Http\Controllers\Backend\AboutMissionController::class, 'index'])->name('admin.about.mission.index');
    Route::post('/about/mission', [\App\Http\Controllers\Backend\AboutMissionController::class, 'update'])->name('admin.about.mission.update');

    Route::get('/about/team', [\App\Http\Controllers\Backend\AboutTeamController::class, 'index'])->name('admin.about.team.index');
    Route::post('/about/team/header', [\App\Http\Controllers\Backend\AboutTeamController::class, 'updateHeader'])->name('admin.about.team.header.update');
    Route::post('/about/team/member', [\App\Http\Controllers\Backend\AboutTeamController::class, 'storeMember'])->name('admin.about.team.member.store');
    Route::delete('/about/team/member/{id}', [\App\Http\Controllers\Backend\AboutTeamController::class, 'deleteMember'])->name('admin.about.team.member.delete');
    Route::post('/about/team/reorder', [\App\Http\Controllers\Backend\AboutTeamController::class, 'reorderMembers'])->name('admin.about.team.reorder');

    Route::get('/about/stats', [\App\Http\Controllers\Backend\AboutStatsController::class, 'index'])->name('admin.about.stats.index');
    Route::post('/about/stats/header', [\App\Http\Controllers\Backend\AboutStatsController::class, 'updateHeader'])->name('admin.about.stats.header.update');
    Route::post('/about/stats/item', [\App\Http\Controllers\Backend\AboutStatsController::class, 'storeItem'])->name('admin.about.stats.item.store');
    Route::delete('/about/stats/item/{id}', [\App\Http\Controllers\Backend\AboutStatsController::class, 'deleteItem'])->name('admin.about.stats.item.delete');
    Route::post('/about/stats/reorder', [\App\Http\Controllers\Backend\AboutStatsController::class, 'reorderItems'])->name('admin.about.stats.reorder');

    Route::get('/about/expertise', [\App\Http\Controllers\Backend\AboutExpertiseController::class, 'index'])->name('admin.about.expertise.index');
    Route::post('/about/expertise/header', [\App\Http\Controllers\Backend\AboutExpertiseController::class, 'updateHeader'])->name('admin.about.expertise.header.update');
    Route::post('/about/expertise/item', [\App\Http\Controllers\Backend\AboutExpertiseController::class, 'storeItem'])->name('admin.about.expertise.item.store');
    Route::delete('/about/expertise/item/{id}', [\App\Http\Controllers\Backend\AboutExpertiseController::class, 'deleteItem'])->name('admin.about.expertise.item.delete');
    Route::post('/about/expertise/reorder', [\App\Http\Controllers\Backend\AboutExpertiseController::class, 'reorderItems'])->name('admin.about.expertise.reorder');

    // Contact Us Page Settings
    Route::get('/contact/header', [\App\Http\Controllers\Backend\ContactHeaderController::class, 'index'])->name('admin.contact.header.index');
    Route::post('/contact/header', [\App\Http\Controllers\Backend\ContactHeaderController::class, 'updateHeader'])->name('admin.contact.header.update');
    Route::post('/contact/card', [\App\Http\Controllers\Backend\ContactHeaderController::class, 'storeCard'])->name('admin.contact.card.store');
    Route::delete('/contact/card/{id}', [\App\Http\Controllers\Backend\ContactHeaderController::class, 'deleteCard'])->name('admin.contact.card.delete');
    Route::post('/contact/card/reorder', [\App\Http\Controllers\Backend\ContactHeaderController::class, 'reorderCards'])->name('admin.contact.card.reorder');

    Route::get('/contact/form', [\App\Http\Controllers\Backend\ContactFormController::class, 'index'])->name('admin.contact.form.index');
    Route::post('/contact/form', [\App\Http\Controllers\Backend\ContactFormController::class, 'update'])->name('admin.contact.form.update');

    Route::get('/contact/faq', [\App\Http\Controllers\Backend\ContactFaqController::class, 'index'])->name('admin.contact.faq.index');
    Route::post('/contact/faq/header', [\App\Http\Controllers\Backend\ContactFaqController::class, 'updateHeader'])->name('admin.contact.faq.header.update');
    Route::post('/contact/faq/item', [\App\Http\Controllers\Backend\ContactFaqController::class, 'storeItem'])->name('admin.contact.faq.item.store');
    Route::delete('/contact/faq/item/{id}', [\App\Http\Controllers\Backend\ContactFaqController::class, 'deleteItem'])->name('admin.contact.faq.item.delete');
    Route::post('/contact/faq/reorder', [\App\Http\Controllers\Backend\ContactFaqController::class, 'reorderItems'])->name('admin.contact.faq.reorder');

    // Service Page Settings
    Route::get('/service-page/banner', [\App\Http\Controllers\Backend\ServiceBannerSectionController::class, 'index'])->name('admin.service-page.banner.index');
    Route::post('/service-page/banner', [\App\Http\Controllers\Backend\ServiceBannerSectionController::class, 'update'])->name('admin.service-page.banner.update');

    Route::get('/service-page/expertise', [\App\Http\Controllers\Backend\ServiceExpertiseSectionController::class, 'index'])->name('admin.service-page.expertise.index');
    Route::post('/service-page/expertise', [\App\Http\Controllers\Backend\ServiceExpertiseSectionController::class, 'update'])->name('admin.service-page.expertise.update');

    Route::get('/service-page/process', [\App\Http\Controllers\Backend\ServiceProcessSectionController::class, 'index'])->name('admin.service-page.process.index');
    Route::post('/service-page/process', [\App\Http\Controllers\Backend\ServiceProcessSectionController::class, 'update'])->name('admin.service-page.process.update');

    Route::get('/service-page/faqs', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'index'])->name('admin.service-page.faqs.index');
    Route::get('/service-page/faqs/create', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'create'])->name('admin.service-page.faqs.create');
    Route::post('/service-page/faqs', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'store'])->name('admin.service-page.faqs.store');
    Route::get('/service-page/faqs/{faq}/edit', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'edit'])->name('admin.service-page.faqs.edit');
    Route::put('/service-page/faqs/{faq}', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'update'])->name('admin.service-page.faqs.update');
    Route::delete('/service-page/faqs/{faq}', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'destroy'])->name('admin.service-page.faqs.destroy');
    Route::match(['post', 'patch'], '/service-page/faqs/{faq}/toggle-status', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'toggleStatus'])->name('admin.service-page.faqs.toggle-status');
    Route::match(['post', 'patch'], '/service-page/faqs/{faq}/toggle', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'toggleStatus'])->name('admin.service-page.faqs.toggle');
    Route::post('/service-page/faqs/settings', [\App\Http\Controllers\Backend\ServiceFaqController::class, 'updateSettings'])->name('admin.service-page.faqs.settings.update');

    // Event Page Settings
    Route::get('/event-page/banner', [\App\Http\Controllers\Backend\EventBannerSectionController::class, 'index'])->name('admin.event-page.banner.index');
    Route::post('/event-page/banner', [\App\Http\Controllers\Backend\EventBannerSectionController::class, 'update'])->name('admin.event-page.banner.update');

    Route::get('/event-page/items', [\App\Http\Controllers\Backend\EventItemController::class, 'index'])->name('admin.event-page.items.index');
    Route::post('/event-page/items/header', [\App\Http\Controllers\Backend\EventItemController::class, 'updateHeader'])->name('admin.event-page.items.header.update');
    Route::get('/event-page/items/create', [\App\Http\Controllers\Backend\EventItemController::class, 'create'])->name('admin.event-page.items.create');
    Route::post('/event-page/items', [\App\Http\Controllers\Backend\EventItemController::class, 'store'])->name('admin.event-page.items.store');
    Route::get('/event-page/items/{item}/edit', [\App\Http\Controllers\Backend\EventItemController::class, 'edit'])->name('admin.event-page.items.edit');
    Route::put('/event-page/items/{item}', [\App\Http\Controllers\Backend\EventItemController::class, 'update'])->name('admin.event-page.items.update');
    Route::delete('/event-page/items/{item}', [\App\Http\Controllers\Backend\EventItemController::class, 'destroy'])->name('admin.event-page.items.destroy');
    Route::match(['post', 'patch'], '/event-page/items/{item}/toggle', [\App\Http\Controllers\Backend\EventItemController::class, 'toggleStatus'])->name('admin.event-page.items.toggle');

    // Portfolio Page Settings
    Route::get('/portfolio-page/banner', [\App\Http\Controllers\Backend\PortfolioBannerController::class, 'index'])->name('admin.portfolio-page.banner.index');
    Route::post('/portfolio-page/banner', [\App\Http\Controllers\Backend\PortfolioBannerController::class, 'update'])->name('admin.portfolio-page.banner.update');
    // Portfolio Tags
    Route::post('/portfolio-page/tags', [\App\Http\Controllers\Backend\PortfolioBannerController::class, 'storeTag'])->name('admin.portfolio-page.tags.store');
    Route::put('/portfolio-page/tags/{tag}', [\App\Http\Controllers\Backend\PortfolioBannerController::class, 'updateTag'])->name('admin.portfolio-page.tags.update');
    Route::delete('/portfolio-page/tags/{tag}', [\App\Http\Controllers\Backend\PortfolioBannerController::class, 'destroyTag'])->name('admin.portfolio-page.tags.destroy');

    // Portfolio Items
    Route::resource('/portfolio-page/items', \App\Http\Controllers\Backend\PortfolioItemController::class, [
        'names' => [
            'index'   => 'admin.portfolio-page.items.index',
            'create'  => 'admin.portfolio-page.items.create',
            'store'   => 'admin.portfolio-page.items.store',
            'edit'    => 'admin.portfolio-page.items.edit',
            'update'  => 'admin.portfolio-page.items.update',
            'destroy' => 'admin.portfolio-page.items.destroy',
        ]
    ])->except(['show']);
    Route::match(['post', 'patch'], '/portfolio-page/items/{item}/toggle', [\App\Http\Controllers\Backend\PortfolioItemController::class, 'toggleStatus'])->name('admin.portfolio-page.items.toggle');

    // Blog Page Settings
    Route::get('/blog-page/banner', [\App\Http\Controllers\Backend\BlogBannerController::class, 'index'])->name('admin.blog-page.banner.index');
    Route::post('/blog-page/banner', [\App\Http\Controllers\Backend\BlogBannerController::class, 'update'])->name('admin.blog-page.banner.update');

    // Blog Items
    Route::resource('/blog-page/items', \App\Http\Controllers\Backend\BlogItemController::class, [
        'names' => [
            'index'   => 'admin.blog-page.items.index',
            'create'  => 'admin.blog-page.items.create',
            'store'   => 'admin.blog-page.items.store',
            'edit'    => 'admin.blog-page.items.edit',
            'update'  => 'admin.blog-page.items.update',
            'destroy' => 'admin.blog-page.items.destroy',
        ]
    ])->except(['show']);
    Route::match(['post', 'patch'], '/blog-page/items/{item}/toggle', [\App\Http\Controllers\Backend\BlogItemController::class, 'toggleStatus'])->name('admin.blog-page.items.toggle');

    // General / Footer Settings
    Route::get('/general-settings', [\App\Http\Controllers\Backend\FooterSettingController::class, 'index'])->name('admin.footer.index');
    Route::post('/general-settings', [\App\Http\Controllers\Backend\FooterSettingController::class, 'update'])->name('admin.footer.update');
});
