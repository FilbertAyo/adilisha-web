<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'team'])->latest('created_at')->paginate(15);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = \App\Models\Team::active()->ordered()->get();
        return view('admin.blog.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            'author_type' => ['required', 'in:team,custom'],
            'team_id' => ['nullable', 'required_if:author_type,team', 'exists:teams,id'],
            'custom_author_name' => ['nullable', 'required_if:author_type,custom', 'string', 'max:255'],
            'custom_author_position' => ['nullable', 'string', 'max:255'],
        ]);

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->slug = Str::slug($validated['title']);
        $blog->excerpt = $validated['excerpt'];
        $blog->content = $validated['content'];
        $blog->user_id = auth()->id();
        $blog->is_published = $request->has('is_published');
        
        // Handle author
        if ($request->author_type === 'team') {
            $blog->team_id = $validated['team_id'];
            $blog->custom_author_name = null;
            $blog->custom_author_position = null;
        } else {
            $blog->team_id = null;
            $blog->custom_author_name = $validated['custom_author_name'];
            $blog->custom_author_position = $validated['custom_author_position'];
        }
        
        if ($blog->is_published) {
            $blog->published_at = now();
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = 'blog_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('blogs', $filename, 'public');
            $blog->featured_image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $teams = \App\Models\Team::active()->ordered()->get();
        return view('admin.blog.edit', compact('blog', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_published' => ['nullable', 'boolean'],
            'author_type' => ['required', 'in:team,custom'],
            'team_id' => ['nullable', 'required_if:author_type,team', 'exists:teams,id'],
            'custom_author_name' => ['nullable', 'required_if:author_type,custom', 'string', 'max:255'],
            'custom_author_position' => ['nullable', 'string', 'max:255'],
        ]);

        $blog->title = $validated['title'];
        $blog->slug = Str::slug($validated['title']);
        $blog->excerpt = $validated['excerpt'];
        $blog->content = $validated['content'];
        
        // Handle author
        if ($request->author_type === 'team') {
            $blog->team_id = $validated['team_id'];
            $blog->custom_author_name = null;
            $blog->custom_author_position = null;
        } else {
            $blog->team_id = null;
            $blog->custom_author_name = $validated['custom_author_name'];
            $blog->custom_author_position = $validated['custom_author_position'];
        }
        
        $wasPublished = $blog->is_published;
        $blog->is_published = $request->has('is_published');
        
        // Set published_at only if it's being published for the first time
        if ($blog->is_published && !$wasPublished) {
            $blog->published_at = now();
        } elseif (!$blog->is_published) {
            $blog->published_at = null;
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            
            $image = $request->file('featured_image');
            $filename = 'blog_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('blogs', $filename, 'public');
            $blog->featured_image = $path;
        }

        $blog->save();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete featured image if exists
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
