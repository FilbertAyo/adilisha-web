<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:team,board'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('team', 'public');
        }

        $team = Team::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'position' => $validated['position'],
            'type' => $validated['type'],
            'instagram' => $validated['instagram'] ?? null,
            'linkedin' => $validated['linkedin'] ?? null,
            'description' => $validated['description'] ?? null,
            'order' => $validated['order'],
            'active' => $request->has('active'),
            'profile_image' => $profileImagePath,
        ]);

        // Clear cache
        Cache::forget('teams_active');
        Cache::forget('boards_active');

        return response()->json([
            'success' => true,
            'message' => 'Team member created successfully.',
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:team,board'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['required', 'integer', 'min:0'],
            'active' => ['nullable'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $team->name = $validated['name'];
        $team->email = $validated['email'] ?? null;
        $team->position = $validated['position'];
        $team->type = $validated['type'];
        $team->instagram = $validated['instagram'] ?? null;
        $team->linkedin = $validated['linkedin'] ?? null;
        $team->description = $validated['description'] ?? null;
        $team->order = $validated['order'];
        $team->active = $request->has('active');

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($team->profile_image) {
                Storage::disk('public')->delete($team->profile_image);
            }
            $team->profile_image = $request->file('profile_image')->store('team', 'public');
        }

        $team->save();

        // Clear cache
        Cache::forget('teams_active');
        Cache::forget('boards_active');

        return response()->json([
            'success' => true,
            'message' => 'Team member updated successfully.',
            'team' => $team
        ]);
    }

    /**
     * Deactivate the specified team member.
     */
    public function deactivate(Team $team)
    {
        $team->delete();

        // Clear cache
        Cache::forget('teams_active');
        Cache::forget('boards_active');

        return response()->json([
            'success' => true,
            'message' => 'Team member deactivated successfully.'
        ]);
    }
}
