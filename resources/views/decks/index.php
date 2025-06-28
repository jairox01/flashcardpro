<x-app-layout>
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Your Decks</h2>
            <a href="{{ route('decks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ New Deck</a>
        </div>

        @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
        @endif

        @if ($decks->count())
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul>
                @foreach ($decks as $deck)
                <li class="border-b px-6 py-4 flex justify-between items-center">
                    <span>{{ $deck->name }}</span>
                    <div class="flex gap-2">
                        <a href="{{ route('decks.show', $deck) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('decks.edit', $deck) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('decks.destroy', $deck) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            {{ $decks->links() }}
        </div>
        @else
        <p class="text-gray-600">You have no decks yet.</p>
        @endif
    </div>
</x-app-layout>
