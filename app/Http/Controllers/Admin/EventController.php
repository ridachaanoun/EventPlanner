<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;

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

    public function register(Event $event)
    {
        // Registration logic here
        return redirect()->route('admin.events.index')->with('success', 'Registered for event successfully!');
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


}
