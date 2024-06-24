<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{
    public function index()
    {
        // Fetch events for the logged-in user
        $userId = Auth::id(); // Get the logged-in user's ID
        $events = Event::where('user_id', $userId)->get();
        return view('user-events', compact('events'));
    }
}




