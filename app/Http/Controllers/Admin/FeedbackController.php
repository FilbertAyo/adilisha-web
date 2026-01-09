<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of feedbacks.
     */
    public function index()
    {
        $feedbacks = Feedback::orderBy('active', 'desc')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Update the specified feedback (activate/deactivate and order).
     */
    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'active' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (isset($validated['active'])) {
            $feedback->active = $validated['active'];
        }

        if (isset($validated['order'])) {
            $feedback->order = $validated['order'];
        }

        $feedback->save();

        return response()->json([
            'success' => true,
            'message' => 'Feedback updated successfully.',
            'feedback' => $feedback
        ]);
    }

    /**
     * Toggle active status of feedback.
     */
    public function toggleActive(Feedback $feedback)
    {
        $feedback->active = !$feedback->active;
        $feedback->save();

        return response()->json([
            'success' => true,
            'message' => $feedback->active ? 'Feedback activated successfully.' : 'Feedback deactivated successfully.',
            'feedback' => $feedback
        ]);
    }

    /**
     * Remove the specified feedback.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return response()->json([
            'success' => true,
            'message' => 'Feedback deleted successfully.'
        ]);
    }
}
