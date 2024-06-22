<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">
                        {{ __('Edit Event') }}
                    </h3>
                    <form method="POST" action="{{ route('admin.events.update', $event) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description', $event->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                            <input type="datetime-local" name="date" id="date" value="{{ old('date', $event->date->format('Y-m-d\TH:i')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
