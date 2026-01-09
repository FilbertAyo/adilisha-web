<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::ordered()->paginate(15);
        
        return view('admin.impact.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.impact.stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|in:student,teacher,community',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('stories/profiles', 'public');
        }

        // Handle image 1 upload
        if ($request->hasFile('image_1')) {
            $validated['image_1'] = $request->file('image_1')->store('stories/images', 'public');
        }

        // Handle image 2 upload
        if ($request->hasFile('image_2')) {
            $validated['image_2'] = $request->file('image_2')->store('stories/images', 'public');
        }

        Story::create($validated);

        return redirect()->route('admin.impact.stories.index')
            ->with('success', 'Success story created successfully.');
    }

    public function edit(Story $story)
    {
        return view('admin.impact.stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|in:student,teacher,community',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture
            if ($story->profile_picture) {
                Storage::disk('public')->delete($story->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('stories/profiles', 'public');
        }

        // Handle image 1 upload
        if ($request->hasFile('image_1')) {
            // Delete old image 1
            if ($story->image_1) {
                Storage::disk('public')->delete($story->image_1);
            }
            $validated['image_1'] = $request->file('image_1')->store('stories/images', 'public');
        }

        // Handle image 2 upload
        if ($request->hasFile('image_2')) {
            // Delete old image 2
            if ($story->image_2) {
                Storage::disk('public')->delete($story->image_2);
            }
            $validated['image_2'] = $request->file('image_2')->store('stories/images', 'public');
        }

        $story->update($validated);

        return redirect()->route('admin.impact.stories.index')
            ->with('success', 'Success story updated successfully.');
    }

    public function destroy(Story $story)
    {
        // Delete associated images
        if ($story->profile_picture) {
            Storage::disk('public')->delete($story->profile_picture);
        }
        if ($story->image_1) {
            Storage::disk('public')->delete($story->image_1);
        }
        if ($story->image_2) {
            Storage::disk('public')->delete($story->image_2);
        }

        $story->delete();

        return redirect()->route('admin.impact.stories.index')
            ->with('success', 'Success story deleted successfully.');
    }
}
