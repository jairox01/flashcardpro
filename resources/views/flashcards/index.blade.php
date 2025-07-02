<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">My Flashcards</h2>
            <a href="{{ route('flashcards.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded">
                + New Flashcard
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($flashcards->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($flashcards as $card)
                    <div class="bg-white rounded-lg shadow-md p-5 hover:shadow-lg transition">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $card->question }}</h3>
                        <p class="text-gray-600 text-sm mb-3">Deck: <span class="font-medium">{{ $card->deck->name }}</span></p>
                        <p class="text-gray-500 text-sm mb-4">Answer: {{ Str::limit($card->answer, 100) }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $card->is_public ? '🌐 Public' : '🔒 Private' }}
                        </p>

                        <div class="flex gap-4 text-sm">
                            <a href="{{ route('flashcards.edit', $card) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('flashcards.destroy', $card) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $flashcards->links() }}
            </div>
        @else
            <p class="text-gray-600">No flashcards found. Click <strong>+ New Flashcard</strong> to create one.</p>
        @endif
    </div>
</x-app-layout>
