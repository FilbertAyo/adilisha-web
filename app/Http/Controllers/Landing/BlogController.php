<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'team'])
            ->published()
            ->latest('published_at')
            ->paginate(9);
            
        return view('landing.blog.index', compact('blogs'));
    }

    /**
     * Display the specified blog.
     */
    public function show($slug)
    {
        $blog = Blog::with(['user', 'team'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();
            
        // Get recent blogs for sidebar (cached)
        $recentBlogs = \Illuminate\Support\Facades\Cache::remember('blog.recent_sidebar', 1800, function () use ($blog) {
            return Blog::with(['user', 'team'])
                ->published()
                ->where('id', '!=', $blog->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        });
        
        // SEO data for blog post
        $seoMeta = [
            'title' => $blog->title . ' - ' . config('app.name'),
            'description' => $blog->excerpt ?? strip_tags(substr($blog->content, 0, 160)),
            'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : null,
            'type' => 'article',
        ];
        
        // Structured data for article
        $structuredData = \App\Services\SeoService::getArticleSchema($blog);
            
        return view('landing.blog.view', compact('blog', 'recentBlogs', 'seoMeta', 'structuredData'));
    }
}
