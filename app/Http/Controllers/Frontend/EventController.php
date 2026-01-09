<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $upcomingEvents = Event::visible()
            ->upcoming()
            ->orderBy('event_date', 'asc')
            ->get();

        $pastEvents = Event::visible()
            ->past()
            ->orderBy('event_date', 'desc')
            ->take(4)
            ->get();

        return view('landing.resources.events', compact('upcomingEvents', 'pastEvents'));
    }

    /**
     * Get latest events for homepage
     */
    public function latest()
    {
        $events = Event::visible()
            ->upcoming()
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();

        return view('partials.events_list', compact('events'));
    }
}
