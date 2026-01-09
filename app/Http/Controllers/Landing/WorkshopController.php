<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $query = Workshop::with(['tags'])
            ->active()
            ->orderBy('workshop_date', 'desc');

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

        $workshops = $query->paginate(12);

        // Get workshop counts by status
        $counts = [
            'all' => Workshop::active()->count(),
            'upcoming' => Workshop::active()->upcoming()->count(),
            'completed' => Workshop::active()->completed()->count(),
        ];

        return view('landing.programs.workshops.index', compact('workshops', 'counts'));
    }

    public function show($slug)
    {
        $workshop = Workshop::with([
            'galleries' => fn($q) => $q->orderBy('order'),
            'testimonials' => fn($q) => $q->active()->orderBy('order'),
            'beneficiaries' => fn($q) => $q->orderBy('order'),
            'tags'
        ])
        ->where('slug', $slug)
        ->active()
        ->firstOrFail();

        // Get recent workshops for sidebar
        $recentWorkshops = Workshop::active()
            ->where('id', '!=', $workshop->id)
            ->orderBy('workshop_date', 'desc')
            ->take(3)
            ->get();

        return view('landing.programs.workshops.view', compact('workshop', 'recentWorkshops'));
    }
}
