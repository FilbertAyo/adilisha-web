<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('creator')
            ->orderBy('event_date', 'desc')
            ->paginate(15);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:255',
            'source' => 'required|in:internal,external',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'registration_open_date' => 'nullable|date|before:registration_close_date',
            'registration_close_date' => 'nullable|date|before:event_date',
            'application_link' => 'nullable|url',
            'is_visible' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/events'), $imageName);
            $validated['image'] = 'images/events/' . $imageName;
        }

        $validated['created_by'] = auth()->id();
        $validated['is_visible'] = $request->has('is_visible') ? true : false;

        Event::create($validated);

        return redirect()->route('admin.resources.events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:255',
            'source' => 'required|in:internal,external',
            'location' => 'required|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'registration_open_date' => 'nullable|date|before:registration_close_date',
            'registration_close_date' => 'nullable|date|before:event_date',
            'application_link' => 'nullable|url',
            'is_visible' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/events'), $imageName);
            $validated['image'] = 'images/events/' . $imageName;
        }

        $validated['is_visible'] = $request->has('is_visible') ? true : false;

        $event->update($validated);

        return redirect()->route('admin.resources.events.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Delete image if exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()->route('admin.resources.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    /**
     * Toggle event visibility
     */
    public function toggleVisibility(Event $event)
    {
        $event->update(['is_visible' => !$event->is_visible]);

        return back()->with('success', 'Event visibility updated.');
    }
}
