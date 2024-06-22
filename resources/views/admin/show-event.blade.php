<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Step 1: Display Event Details -->
                    <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">
                        {{ $event->title }}
                    </h3>
                    <p class="mb-4"><strong>Description:</strong> {{ $event->description }}</p>
                    <p class="mb-4"><strong>Date:</strong> {{ $event->date->format('F j, Y, g:i a') }}</p>
                    <p class="mb-4"><strong>Location:</strong> {{ $event->location }}</p>

                    <!-- Step 2: Display Comments -->
                    <h4 class="font-semibold text-lg text-gray-800 leading-tight mb-2">Comments</h4>
                    @if ($event->comments && !$event->comments->isEmpty())
                        <ul>
                            @foreach ($event->comments as $comment)
                                <li>{{ $comment->content }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No comments yet.</p>
                    @endif

                    <!-- Step 3: Add Comment Form -->
                    <form action="{{ route('admin.events.add-comment', $event) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Add Comment:</label>
                            <textarea name="content" id="content" rows="3" class="form-textarea mt-1 block w-full rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Add your comment here" required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
