<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    /**
     * Display the feedback page.
     */
    public function index()
    {
        $feedbacks = Feedback::active()->ordered()->get();
        return view('landing.impact.feedback', compact('feedbacks'));
    }

    /**
     * Store a newly submitted feedback.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'from' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        Feedback::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'from' => $validated['from'] ?? null,
            'position' => $validated['position'] ?? null,
            'rating' => $validated['rating'],
            'message' => $validated['message'],
            'active' => false, // Inactive by default until approved
            'order' => 0,
        ]);

        return redirect()->route('impact.feedback')
            ->with('success', 'Thank you for your feedback! It will be reviewed and published after approval.');
    }
}
