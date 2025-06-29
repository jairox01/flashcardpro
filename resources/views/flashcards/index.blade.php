<x-app-layout>
    <div class="max-w-5xl mx-auto py-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Your Flashcards</h2>
            <a href="{{ route('flashcards.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ New Flashcard</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($flashcards->count())
            <table class="w-full bg-white shadow rounded">
                <thead>
                <tr class="text-left border-b">
                    <th class="px-6 py-3">Question</th>
                    <th class="px-6 py-3">Deck</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($flashcards as $card)
                    <tr class="border-b">
                        <td class="px-6 py-3">{{ $card->question }}</td>
                        <td class="px-6 py-3">{{ $card->deck->name }}</td>
                        <td class="px-6 py-3 flex gap-3">
                            <a href="{{ route('flashcards.edit', $card) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('flashcards.destroy', $card) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $flashcards->links() }}
            </div>
        @else
            <p class="text-gray-600">You have no flashcards yet.</p>
        @endif
    </div>
</x-app-layout>
