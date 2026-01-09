<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Compress and optimize image to JPG format (max 400KB)
     */
    private function compressImage($imageFile, $maxSizeKB = 400)
    {
        $maxSizeBytes = $maxSizeKB * 1024;
        $quality = 85;
        $tempPath = $imageFile->getRealPath();
        
        // Get image info
        $imageInfo = getimagesize($tempPath);
        $mimeType = $imageInfo['mime'];
        
        // Create image resource based on type
        switch ($mimeType) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($tempPath);
                break;
            case 'image/png':
                $image = imagecreatefrompng($tempPath);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($tempPath);
                break;
            default:
                throw new \Exception('Unsupported image format');
        }
        
        // Resize if too large (max 1920px width while maintaining aspect ratio)
        $maxWidth = 1920;
        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);
        
        if ($originalWidth > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = ($originalHeight * $newWidth) / $originalWidth;
            $resized = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
            imagedestroy($image);
            $image = $resized;
        }
        
        // Save as JPG with compression
        $outputPath = sys_get_temp_dir() . '/' . uniqid() . '.jpg';
        
        // Compress until under max size
        do {
            imagejpeg($image, $outputPath, $quality);
            $fileSize = filesize($outputPath);
            
            if ($fileSize > $maxSizeBytes && $quality > 30) {
                $quality -= 5;
                unlink($outputPath);
            } else {
                break;
            }
        } while ($quality > 30);
        
        imagedestroy($image);
        
        return $outputPath;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('category')->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        $categories = \App\Models\GalleryCategory::active()->ordered()->get();
        return view('admin.resources.gallery.index', compact('galleries', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:gallery_categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'], // Allow up to 5MB upload, will compress
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
        ]);

        try {
            // Compress image
            $compressedImagePath = $this->compressImage($request->file('image'), 400);
            
            // Generate unique filename
            $filename = 'gallery_' . uniqid() . '.jpg';
            $storagePath = 'gallery/' . $filename;
            
            // Store compressed image
            Storage::disk('public')->put($storagePath, file_get_contents($compressedImagePath));
            
            // Clean up temp file
            unlink($compressedImagePath);
            
            $gallery = Gallery::create([
                'title' => $validated['title'] ?? null,
                'category_id' => $validated['category_id'] ?? null,
                'image_path' => $storagePath,
                'order' => $validated['order'],
                'active' => $request->has('active'),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Gallery image added successfully.',
                'gallery' => $gallery
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error processing image: ' . $e->getMessage()
            ], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:gallery_categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
        ]);

        $gallery->title = $validated['title'] ?? null;
        $gallery->category_id = $validated['category_id'] ?? null;
        $gallery->order = $validated['order'];
        $gallery->active = $request->has('active');

        if ($request->hasFile('image')) {
            try {
                // Compress new image
                $compressedImagePath = $this->compressImage($request->file('image'), 400);
                
                // Delete old image
                if ($gallery->image_path) {
                    Storage::disk('public')->delete($gallery->image_path);
                }
                
                // Generate unique filename
                $filename = 'gallery_' . uniqid() . '.jpg';
                $storagePath = 'gallery/' . $filename;
                
                // Store compressed image
                Storage::disk('public')->put($storagePath, file_get_contents($compressedImagePath));
                
                // Clean up temp file
                unlink($compressedImagePath);
                
                $gallery->image_path = $storagePath;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error processing image: ' . $e->getMessage()
                ], 422);
            }
        }

        $gallery->save();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image updated successfully.',
            'gallery' => $gallery
        ]);
    }

    /**
     * Deactivate the specified gallery image.
     */
    public function deactivate(Gallery $gallery)
    {
        // Delete image file
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gallery image deleted successfully.'
        ]);
    }
}
