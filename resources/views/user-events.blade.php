<!-- resources/views/user-events.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display Events Created by You -->
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">
                        {{ __('Events Created by You') }}
                    </h3>
                    @forelse($events as $event)
                        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                            <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
                            <p>{{ $event->description }}</p>
                            <p><strong>Date:</strong> {{ $event->date }}</p>
                            <p><strong>Location:</strong> {{ $event->location }}</p>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('user.events.edit', $event) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form action="{{ route('user.events.destroy', $event) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                                <form action="{{ route('user.events.register', $event) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
                                </form>
                                <a href="{{ route('user.events.show', $event) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Show</a>
                            </div>
                        </div>
                    @empty
                        <p>You have no events.</p>
                    @endforelse

                    <!-- Display Other Events -->
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4 mt-8">
                        {{ __('Other Events') }}
                    </h3>
                    @forelse($another_events as $another_event)
                        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                            <h3 class="text-xl font-bold mb-2">{{ $another_event->title }}</h3>
                            <p>{{ $another_event->description }}</p>
                            <p><strong>Date:</strong> {{ $another_event->date }}</p>
                            <p><strong>Location:</strong> {{ $another_event->location }}</p>
                            <div class="flex justify-between mt-4">
                                <a href="{{ route('user.events.show', $another_event) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                <form action="{{ route('user.events.register', $another_event) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>No other events available.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
