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
        // Enable query string caching for pagination
        \Illuminate\Pagination\Paginator::useBootstrap();
        
        // Share recent blogs with footer (cached)
        view()->composer('layouts.footer', function ($view) {
            $recentBlogs = \Illuminate\Support\Facades\Cache::remember('footer.recent_blogs', 3600, function () {
                return \App\Models\Blog::with(['user', 'team'])
                    ->published()
                    ->latest('published_at')
                    ->take(2)
                    ->get();
            });
            
            $view->with('recentBlogs', $recentBlogs);
        });
    }
}
