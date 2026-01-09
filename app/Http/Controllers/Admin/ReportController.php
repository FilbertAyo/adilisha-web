<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf|max:10240', // 10MB max
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048', // 2MB max
            'year' => 'nullable|string|max:4',
            'category' => 'required|string|in:annual,financial,impact,strategic,program',
            'highlights' => 'nullable|string',
            'published_date' => 'nullable|date',
            'is_featured' => 'boolean'
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('reports', $fileName, 'public');
            
            // Calculate file size
            $fileSize = $this->formatFileSize($file->getSize());
            
            $validated['file_path'] = $filePath;
            $validated['file_size'] = $fileSize;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = 'thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('reports/thumbnails', $thumbnailName, 'public');
            $validated['thumbnail_path'] = $thumbnailPath;
        }

        // Convert highlights to array if provided
        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_map('trim', explode(',', $validated['highlights']));
        }

        Report::create($validated);

        return redirect()->route('admin.reports.index')
            ->with('success', 'Report uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'year' => 'nullable|string|max:4',
            'category' => 'required|string|in:annual,financial,impact,strategic,program',
            'highlights' => 'nullable|string',
            'published_date' => 'nullable|date',
            'is_featured' => 'boolean'
        ]);

        // Handle file upload if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            if ($report->file_path) {
                Storage::disk('public')->delete($report->file_path);
            }
            
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('reports', $fileName, 'public');
            
            $fileSize = $this->formatFileSize($file->getSize());
            
            $validated['file_path'] = $filePath;
            $validated['file_size'] = $fileSize;
        }

        // Handle thumbnail upload if new thumbnail is provided
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($report->thumbnail_path) {
                Storage::disk('public')->delete($report->thumbnail_path);
            }
            
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = 'thumb_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = $thumbnail->storeAs('reports/thumbnails', $thumbnailName, 'public');
            $validated['thumbnail_path'] = $thumbnailPath;
        }

        // Convert highlights to array if provided
        if (!empty($validated['highlights'])) {
            $validated['highlights'] = array_map('trim', explode(',', $validated['highlights']));
        }

        $report->update($validated);

        return redirect()->route('admin.reports.index')
            ->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        // Delete file from storage
        if ($report->file_path) {
            Storage::disk('public')->delete($report->file_path);
        }

        // Delete thumbnail from storage
        if ($report->thumbnail_path) {
            Storage::disk('public')->delete($report->thumbnail_path);
        }

        $report->delete();

        return redirect()->route('admin.reports.index')
            ->with('success', 'Report deleted successfully.');
    }

    /**
     * Format file size to human readable format
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }
}
