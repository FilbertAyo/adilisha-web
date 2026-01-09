<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = GalleryCategory::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.resources.gallery-category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
        ]);

        $category = GalleryCategory::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'order' => $validated['order'],
            'active' => $request->has('active'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gallery category created successfully.',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
        ]);

        $galleryCategory->name = $validated['name'];
        $galleryCategory->description = $validated['description'] ?? null;
        $galleryCategory->order = $validated['order'];
        $galleryCategory->active = $request->has('active');

        $galleryCategory->save();

        return response()->json([
            'success' => true,
            'message' => 'Gallery category updated successfully.',
            'category' => $galleryCategory
        ]);
    }

    /**
     * Deactivate the specified gallery category.
     */
    public function deactivate(GalleryCategory $galleryCategory)
    {
        // Check if category has galleries
        if ($galleryCategory->galleries()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category with associated galleries. Please reassign or delete galleries first.'
            ], 422);
        }

        $galleryCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery category deleted successfully.'
        ]);
    }
}