<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Filter by year
        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }

        $reports = $query->latest('published_date')->paginate(12);
        
        // Get available years for filter
        $years = Report::distinct()->pluck('year')->filter()->sort()->reverse();

        return view('landing.resources.reports', compact('reports', 'years'));
    }

    public function download(Report $report)
    {
        $report->incrementDownloads();
        return response()->download(storage_path('app/public/' . $report->file_path));
    }
}
