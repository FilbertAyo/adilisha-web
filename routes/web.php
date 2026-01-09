<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Get a few recent gallery images for the welcome page
    $featuredGalleries = \App\Models\Gallery::with('category')->active()->ordered()->take(8)->get();
    return view('welcome', compact('featuredGalleries'));
})->name('home');

Route::get('/contact', function () {
    return view('landing.about.contact');
})->name('contact');

Route::get('/about-us', function () {
    return view('landing.about.about-us');
})->name('about-us');

Route::get('/our-team', function () {
    $teams = \App\Models\Team::active()->ordered()->get();
    return view('landing.about.team', compact('teams'));
})->name('our-team');

Route::get('/agenda-2049', function () {
    return view('landing.about.agenda');
})->name('agenda-2049');

Route::get('/blog', function () {
    return view('landing.blog.index');
})->name('blog');

Route::get('/workshops', function () {
    return view('landing.programs.workshops.index');
})->name('workshops');

Route::get('/workshops/view', function () {
    return view('landing.programs.workshops.view');
})->name('workshops.view');

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
    
    Route::get('/events', function () {
        return view('landing.resources.events');
    })->name('resources.events');
    
    Route::get('/reports', function () {
        return view('landing.resources.reports');
    })->name('resources.reports');
    
    Route::get('/publications', function () {
        return view('landing.resources.publications');
    })->name('resources.publications');
});

Route::prefix('programs')->group(function () {
    Route::get('/chomoza', function () {
        return view('landing.programs.chomoza');
    })->name('programs.chomoza');
});

Route::prefix('impact')->group(function () {
    Route::get('/stories', function () {
        return view('landing.impact.stories');
    })->name('impact.stories');
    
    Route::get('/feedback', function () {
        return view('landing.impact.feedback');
    })->name('impact.feedback');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
    });
});

require __DIR__.'/auth.php';
