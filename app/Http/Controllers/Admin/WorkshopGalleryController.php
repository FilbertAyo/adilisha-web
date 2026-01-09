<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use App\Models\WorkshopGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopGalleryController extends Controller
{
    public function store(Request $request, Workshop $workshop)
    {
        $validated = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $order = $workshop->galleries()->max('order') ?? 0;

        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('workshops/galleries', 'public');
            
            WorkshopGallery::create([
                'workshop_id' => $workshop->id,
                'image_path' => $path,
                'caption' => $validated['captions'][$index] ?? null,
                'order' => ++$order,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Gallery images uploaded successfully!',
        ]);
    }

    public function update(Request $request, Workshop $workshop, WorkshopGallery $gallery)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $gallery->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Gallery image updated successfully!',
            'gallery' => $gallery,
        ]);
    }

    public function destroy(Workshop $workshop, WorkshopGallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image deleted successfully!',
        ]);
    }
}
