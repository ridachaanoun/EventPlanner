<!-- resources/views/user-events.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    @if($events->isEmpty())
        <p>No events found for this user.</p>
    @else
        @foreach($events as $event)
        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
            <p>{{ $event->description }}</p>
            <p><strong>Date:</strong> {{ $event->date }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <!-- Add more event details as needed -->
        </div>
        @endforeach
    @endif
</div>
@endsection


