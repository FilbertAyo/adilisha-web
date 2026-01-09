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
            
        // Get recent blogs for sidebar
        $recentBlogs = Blog::with(['user', 'team'])
            ->published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        return view('landing.blog.view', compact('blog', 'recentBlogs'));
    }
}
