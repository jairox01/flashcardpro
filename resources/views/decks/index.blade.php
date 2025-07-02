<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">My Decks</h2>
            <a href="{{ route('decks.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded">
                + New Deck
            </a>
        </div>

        @if(session('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
        @endif

        @if ($decks->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($decks as $deck)
            <div class="p-6 bg-white rounded-lg shadow hover:shadow-md transition-all">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $deck->name }}</h3>
                <p class="text-sm text-gray-500 mb-4">{{ $deck->flashcards_count }} cards</p>
                <p class="text-sm text-gray-500">
                    {{ $deck->is_public ? '🌐 Public' : '🔒 Private' }}
                </p>

                <div class="flex gap-4 text-sm">
                    <a href="{{ route('decks.show', $deck) }}" class="text-blue-600 hover:underline">View</a>
                    <a href="{{ route('decks.edit', $deck) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('decks.destroy', $deck) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-600">You haven’t created any decks yet. Click <strong>+ New Deck</strong> to get started.</p>
        @endif
    </div>
</x-app-layout>
