<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Workshop::with(['creator', 'tags']);

        // Filter by status
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Filter by date range
        if ($request->filled('from_date')) {
            $query->where('workshop_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->where('workshop_date', '<=', $request->to_date);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $workshops = $query->orderBy('workshop_date', 'desc')->paginate(15);
        
        return view('admin.workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = WorkshopTag::orderBy('name')->get();
        return view('admin.workshops.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:workshops,slug',
            'type' => 'nullable|string|max:255',
            'source' => 'required|in:internal,external',
            'overview' => 'nullable|string',
            'what_we_learned' => 'nullable|string',
            'workshop_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'total_participants' => 'nullable|integer|min:0',
            'girls_participation' => 'nullable|integer|min:0',
            'attendance_rate' => 'nullable|numeric|min:0|max:100',
            'schools_represented' => 'nullable|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled,open,closed',
            'is_active' => 'boolean',
            'registration_open_date' => 'nullable|date',
            'registration_close_date' => 'nullable|date|after_or_equal:registration_open_date',
            'application_link' => 'nullable|url|max:500',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:workshop_tags,id',
        ]);

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('workshops', 'public');
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['created_by'] = auth()->id();

        $workshop = Workshop::create($validated);

        // Attach tags
        if ($request->filled('tags')) {
            $workshop->tags()->attach($request->tags);
        }

        return redirect()->route('admin.workshops.edit', $workshop)
            ->with('success', 'Workshop created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        $workshop->load(['creator', 'galleries', 'testimonials', 'beneficiaries', 'tags']);
        return view('admin.workshops.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        $workshop->load(['galleries', 'testimonials', 'beneficiaries', 'tags']);
        $tags = WorkshopTag::orderBy('name')->get();
        return view('admin.workshops.edit', compact('workshop', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:workshops,slug,' . $workshop->id,
            'type' => 'nullable|string|max:255',
            'source' => 'required|in:internal,external',
            'overview' => 'nullable|string',
            'what_we_learned' => 'nullable|string',
            'workshop_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'total_participants' => 'nullable|integer|min:0',
            'girls_participation' => 'nullable|integer|min:0',
            'attendance_rate' => 'nullable|numeric|min:0|max:100',
            'schools_represented' => 'nullable|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled,open,closed',
            'is_active' => 'boolean',
            'registration_open_date' => 'nullable|date',
            'registration_close_date' => 'nullable|date|after_or_equal:registration_open_date',
            'application_link' => 'nullable|url|max:500',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:workshop_tags,id',
        ]);

        // Handle slug - if empty or null, keep existing or generate from title
        if (empty($validated['slug']) || $validated['slug'] === null) {
            // If title changed, generate new slug, otherwise keep existing
            if ($validated['title'] !== $workshop->title) {
                $validated['slug'] = Str::slug($validated['title']);
            } else {
                // Don't update slug - remove it from validated array
                unset($validated['slug']);
            }
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($workshop->main_image) {
                Storage::disk('public')->delete($workshop->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('workshops', 'public');
        }

        $workshop->update($validated);

        // Sync tags
        if ($request->has('tags')) {
            $workshop->tags()->sync($request->tags ?? []);
        }

        return redirect()->route('admin.workshops.edit', $workshop)
            ->with('success', 'Workshop updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        // Delete main image
        if ($workshop->main_image) {
            Storage::disk('public')->delete($workshop->main_image);
        }

        // Delete gallery images
        foreach ($workshop->galleries as $gallery) {
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }
        }

        // Delete testimonial images
        foreach ($workshop->testimonials as $testimonial) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
        }

        // Delete beneficiary images
        foreach ($workshop->beneficiaries as $beneficiary) {
            if ($beneficiary->image) {
                Storage::disk('public')->delete($beneficiary->image);
            }
        }

        $workshop->delete();

        return redirect()->route('admin.workshops.index')
            ->with('success', 'Workshop deleted successfully!');
    }

    /**
     * Toggle workshop active status
     */
    public function toggleActive(Workshop $workshop)
    {
        $workshop->update(['is_active' => !$workshop->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $workshop->is_active,
            'message' => 'Workshop status updated successfully!'
        ]);
    }
}
