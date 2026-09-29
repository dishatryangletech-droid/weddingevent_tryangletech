<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(120);

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            if (!\Illuminate\Support\Facades\App::runningInConsole()) {
                try {
                    $view->with('footerSetting', \App\Models\FooterSetting::getSettings());
                } catch (\Throwable $e) {
                    // Fallback if database table not yet migrated
                }
            }
        });
    }
}
