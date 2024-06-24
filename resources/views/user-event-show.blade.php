<!-- resources/views/user-event-show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <p>{{ $event->description }}</p>
        <p>Date: {{ $event->date }}</p>
        <p>Location: {{ $event->location }}</p>
        <!-- Add more fields as needed -->
    </div>
@endsection
