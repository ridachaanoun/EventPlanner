<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration; 
class UserEventController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', auth()->user()->id)->get();
        $another_events = Event::where('user_id', '!=', auth()->user()->id)->get();
        return view('user-events', compact('events','another_events'));
    }

    public function show(Event $event)
    {
        return view('show-user-events', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('edit-user-event', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('user-events')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('user-events')->with('success', 'Event deleted successfully!');
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
    

}
