<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class StoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Story::published()->ordered();
        
        // Filter by category if provided
        if ($request->has('category') && in_array($request->category, ['student', 'teacher', 'community'])) {
            $query->where('category', $request->category);
        }
        
        $stories = $query->paginate(12);
        
        return view('landing.impact.stories', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::published()->findOrFail($id);
        $relatedStories = Story::published()
            ->where('id', '!=', $id)
            ->where('category', $story->category)
            ->ordered()
            ->limit(3)
            ->get();
        
        return view('landing.impact.story', compact('story', 'relatedStories'));
    }
}
