<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Registration; 

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.edit-event', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    public function show(Event $event)
    {
        return view('admin.show-event', compact('event'));
    }

    public function addComment(Request $request, Event $event)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $event->comments()->create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // Handle event registration
    public function register(Event $event)
    {
        // Assuming you have authentication set up and the user is authenticated
        $userId = auth()->id();

        // Check if the user is already registered for the event
        $existingRegistration = Registration::where('event_id', $event->id)
            ->where('user_id', $userId)
            ->first();

        if ($existingRegistration) {
            return redirect()->route('admin.events.show', $event)->with('error', 'You are already registered for this event.');
        }

        // Create a new registration for the event
        Registration::create([
            'user_id' => $userId,
            'event_id' => $event->id,
            'status' => 'registered', // Set initial status as registered
        ]);

        return redirect()->route('admin.events.show', $event)->with('success', 'Registered for event successfully!');
    }
     /**
     * Store the rating for an event.
     *
     * @param  Request  $request
     * @param  Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRating(Request $request, Event $event)
    {
        $request->validate([
            'rating' => 'required|integer|min:0|max:5', // Adjust validation rules as needed
        ]);

        $rating = new Rating();
        $rating->user_id = auth()->id();
        $rating->event_id = $event->id;
        $rating->rating = $request->rating;
        $rating->save();

        return redirect()->back()->with('success', 'Rating saved successfully!');
    }

}
