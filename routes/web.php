<?php

use App\Http\Controllers\Landing\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('robots');

Route::get('/', function () {
    // Cache homepage data for 30 minutes
    $featuredGalleries = \Illuminate\Support\Facades\Cache::remember('home.galleries', 1800, function () {
        return \App\Models\Gallery::with('category')->active()->ordered()->take(8)->get();
    });
    
    $recentBlogs = \Illuminate\Support\Facades\Cache::remember('home.blogs', 1800, function () {
        return \App\Models\Blog::with('user')->published()->latest('published_at')->take(3)->get();
    });
    
    $stories = \Illuminate\Support\Facades\Cache::remember('home.stories', 1800, function () {
        return \App\Models\Story::published()->ordered()->take(3)->get();
    });
    
    // SEO data for homepage
    $seoMeta = [
        'title' => config('app.name') . ' - Empowering Youth Through STEM Education in Tanzania',
        'description' => 'Join Adilisha in empowering children—especially girls—with practical STEM skills through our VUTAMDOGO and CHOMOZA programs. Building a gender-neutral future in technology.',
        'keywords' => 'STEM education Tanzania, girls in STEM, youth empowerment, VUTAMDOGO, CHOMOZA, technology education, child development NGO',
    ];
    
    return view('welcome', compact('featuredGalleries', 'recentBlogs', 'stories', 'seoMeta'));
})->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-us', function () {
    return view('landing.about.about-us');
})->name('about-us');

Route::get('/our-team', function () {
    $teams = \Illuminate\Support\Facades\Cache::remember('teams_active', 3600, function () {
        return \App\Models\Team::active()->teamMembers()->ordered()->get();
    });
    return view('landing.about.team', compact('teams'));
})->name('our-team');

Route::get('/board-of-directors', function () {
    $boards = \Illuminate\Support\Facades\Cache::remember('boards_active', 3600, function () {
        return \App\Models\Team::active()->boardMembers()->ordered()->get();
    });
    return view('landing.about.board', compact('boards'));
})->name('board-of-directors');

Route::get('/agenda-2049', function () {
    return view('landing.about.agenda');
})->name('agenda-2049');

Route::get('/blog', [\App\Http\Controllers\Landing\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [\App\Http\Controllers\Landing\BlogController::class, 'show'])->name('blog.show');

Route::get('/events', [\App\Http\Controllers\Landing\WorkshopController::class, 'index'])->name('events');
Route::get('/events/{slug}', [\App\Http\Controllers\Landing\WorkshopController::class, 'show'])->name('events.show');

Route::get('/partnership', function () {
    return view('landing.partnership.index');
})->name('partnership');

Route::get('/donations', function () {
    return view('landing.donations.index');
})->name('donations');

Route::prefix('resources')->group(function () {
    Route::get('/career-opportunities', function () {
        return view('landing.resources.carrier');
    })->name('resources.carrier');
    
    Route::get('/recruit', function () {
        return view('landing.resources.recruit');
    })->name('resources.recruit');
    
    Route::get('/gallery', function () {
        $categoryId = request('category');
        $galleries = \App\Models\Gallery::with('category')->active()->ordered();
        
        if ($categoryId) {
            $galleries = $galleries->category($categoryId);
        }
        
        $galleries = $galleries->get();
        $categories = \App\Models\GalleryCategory::active()->ordered()->get();
        
        // Get photo counts for each category
        $categoryCounts = [];
        foreach ($categories as $category) {
            $categoryCounts[$category->id] = \App\Models\Gallery::active()->category($category->id)->count();
        }
        
        return view('landing.resources.gallery', compact('galleries', 'categories', 'categoryCounts', 'categoryId'));
    })->name('resources.gallery');
    
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('resources.reports');
    
    Route::get('/publications', function () {
        return view('landing.resources.publications');
    })->name('resources.publications');
});

// Reports routes
Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/{report}/download', [\App\Http\Controllers\ReportController::class, 'download'])->name('reports.download');

Route::prefix('programs')->group(function () {
    Route::get('/stem-labs', function () {
        return view('landing.programs.stem-labs');
    })->name('programs.stem-labs');
});

Route::prefix('impact')->group(function () {
    Route::get('/stories', [\App\Http\Controllers\StoryController::class, 'index'])->name('impact.stories');
    Route::get('/stories/{id}', [\App\Http\Controllers\StoryController::class, 'show'])->name('impact.stories.show');
    
    Route::get('/feedback', [\App\Http\Controllers\Landing\FeedbackController::class, 'index'])->name('impact.feedback');
    Route::post('/feedback', [\App\Http\Controllers\Landing\FeedbackController::class, 'store'])->name('impact.feedback.store');
});

Route::get('/dashboard', function () {
    // Statistics
    $stats = [
        'blogs_total' => \App\Models\Blog::count(),
        'blogs_published' => \App\Models\Blog::published()->count(),
        'gallery_total' => \App\Models\Gallery::count(),
        'gallery_active' => \App\Models\Gallery::active()->count(),
        'team_total' => \App\Models\Team::count(),
        'team_active' => \App\Models\Team::active()->count(),
        'users_total' => \App\Models\User::count(),
        'feedback_total' => \App\Models\Feedback::count(),
        'feedback_active' => \App\Models\Feedback::active()->count(),
        'reports_total' => \App\Models\Report::count(),
        'workshops_total' => \App\Models\Workshop::count(),
        'workshops_upcoming' => \App\Models\Workshop::upcoming()->count(),
        'workshops_completed' => \App\Models\Workshop::completed()->count(),
        'stories_total' => \App\Models\Story::count(),
        'stories_published' => \App\Models\Story::published()->count(),
    ];

    // Recent items
    $recentBlogs = \App\Models\Blog::with('user')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    
    $recentFeedback = \App\Models\Feedback::orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('dashboard', compact('stats', 'recentBlogs', 'recentFeedback'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin Users Management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->except(['create', 'edit', 'show']);
        Route::post('users/{user}/deactivate', [\App\Http\Controllers\Admin\UserController::class, 'deactivate'])->name('users.deactivate');
        
        // Admin Team Management
        Route::resource('team', \App\Http\Controllers\Admin\TeamController::class)->except(['create', 'edit', 'show']);
        Route::post('team/{team}/deactivate', [\App\Http\Controllers\Admin\TeamController::class, 'deactivate'])->name('team.deactivate');
        
        // Admin Gallery Management
        Route::resource('gallery', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'edit', 'show']);
        Route::post('gallery/{gallery}/deactivate', [\App\Http\Controllers\Admin\GalleryController::class, 'deactivate'])->name('gallery.deactivate');
        
        // Admin Gallery Category Management
        Route::resource('gallery-category', \App\Http\Controllers\Admin\GalleryCategoryController::class)->except(['create', 'edit', 'show']);
        Route::post('gallery-category/{galleryCategory}/deactivate', [\App\Http\Controllers\Admin\GalleryCategoryController::class, 'deactivate'])->name('gallery-category.deactivate');
        
        // Admin Blog Management
        Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
        
        // Admin Reports Management
        Route::resource('reports', \App\Http\Controllers\Admin\ReportController::class);
        
        // Admin Feedback Management
        Route::get('feedback', [\App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('feedback.index');
        Route::put('feedback/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'update'])->name('feedback.update');
        Route::post('feedback/{feedback}/toggle-active', [\App\Http\Controllers\Admin\FeedbackController::class, 'toggleActive'])->name('feedback.toggle-active');
        Route::delete('feedback/{feedback}', [\App\Http\Controllers\Admin\FeedbackController::class, 'destroy'])->name('feedback.destroy');
        
        // Admin Workshops Management
        Route::resource('workshops', \App\Http\Controllers\Admin\WorkshopController::class);
        Route::post('workshops/{workshop}/toggle-active', [\App\Http\Controllers\Admin\WorkshopController::class, 'toggleActive'])->name('workshops.toggle-active');
        
        // Workshop Gallery Management
        Route::post('workshops/{workshop}/galleries', [\App\Http\Controllers\Admin\WorkshopGalleryController::class, 'store'])->name('workshops.galleries.store');
        Route::put('workshops/{workshop}/galleries/{gallery}', [\App\Http\Controllers\Admin\WorkshopGalleryController::class, 'update'])->name('workshops.galleries.update');
        Route::delete('workshops/{workshop}/galleries/{gallery}', [\App\Http\Controllers\Admin\WorkshopGalleryController::class, 'destroy'])->name('workshops.galleries.destroy');
        
        // Workshop Testimonial Management
        Route::post('workshops/{workshop}/testimonials', [\App\Http\Controllers\Admin\WorkshopTestimonialController::class, 'store'])->name('workshops.testimonials.store');
        Route::put('workshops/{workshop}/testimonials/{testimonial}', [\App\Http\Controllers\Admin\WorkshopTestimonialController::class, 'update'])->name('workshops.testimonials.update');
        Route::delete('workshops/{workshop}/testimonials/{testimonial}', [\App\Http\Controllers\Admin\WorkshopTestimonialController::class, 'destroy'])->name('workshops.testimonials.destroy');
        Route::post('workshops/{workshop}/testimonials/{testimonial}/toggle-active', [\App\Http\Controllers\Admin\WorkshopTestimonialController::class, 'toggleActive'])->name('workshops.testimonials.toggle-active');
        
        // Workshop Beneficiary Management
        Route::post('workshops/{workshop}/beneficiaries', [\App\Http\Controllers\Admin\WorkshopBeneficiaryController::class, 'store'])->name('workshops.beneficiaries.store');
        Route::put('workshops/{workshop}/beneficiaries/{beneficiary}', [\App\Http\Controllers\Admin\WorkshopBeneficiaryController::class, 'update'])->name('workshops.beneficiaries.update');
        Route::delete('workshops/{workshop}/beneficiaries/{beneficiary}', [\App\Http\Controllers\Admin\WorkshopBeneficiaryController::class, 'destroy'])->name('workshops.beneficiaries.destroy');
        
        // Admin Stories Management
        Route::prefix('impact')->name('impact.')->group(function () {
            Route::resource('stories', \App\Http\Controllers\Admin\StoryController::class);
        });
    });
});

require __DIR__.'/auth.php';
