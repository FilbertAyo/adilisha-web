<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopTestimonialController extends Controller
{
    public function store(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'school' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('workshops/testimonials', 'public');
        }

        if (!isset($validated['order'])) {
            $validated['order'] = $workshop->testimonials()->max('order') + 1 ?? 0;
        }

        $validated['workshop_id'] = $workshop->id;

        $testimonial = WorkshopTestimonial::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Testimonial added successfully!',
            'testimonial' => $testimonial,
        ]);
    }

    public function update(Request $request, Workshop $workshop, WorkshopTestimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'school' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('workshops/testimonials', 'public');
        }

        $testimonial->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Testimonial updated successfully!',
            'testimonial' => $testimonial,
        ]);
    }

    public function destroy(Workshop $workshop, WorkshopTestimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return response()->json([
            'success' => true,
            'message' => 'Testimonial deleted successfully!',
        ]);
    }

    public function toggleActive(Workshop $workshop, WorkshopTestimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $testimonial->is_active,
            'message' => 'Testimonial status updated successfully!',
        ]);
    }
}
