<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Share recent blogs with footer
        view()->composer('layouts.footer', function ($view) {
            $recentBlogs = \App\Models\Blog::with(['user', 'team'])
                ->published()
                ->latest('published_at')
                ->take(2)
                ->get();
            
            $view->with('recentBlogs', $recentBlogs);
        });
    }
}
