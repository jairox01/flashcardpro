<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-6">
        {{-- Deck Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $deck->name }}</h1>
                <p class="text-gray-500 text-sm mt-1">{{ $deck->flashcards()->count() }} cards</p>
            </div>

            <div class="flex gap-3 items-center">
                <a href="{{ route('decks.index') }}"
                   class="text-sm text-gray-600 hover:underline">
                    ← Back
                </a>

                <a href="{{ route('study', ['deck' => $deck->id]) }}"
                   class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded">
                    Study This Deck
                </a>
                <a href="{{ route('flashcards.create', ['deck_id' => $deck->id]) }}"
                   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded">
                    + Add New Card
                </a>
            </div>
        </div>

        {{-- Flashcards List --}}
        @if ($deck->flashcards->count())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($deck->flashcards as $card)
                    <div class="p-4 bg-white rounded-lg shadow-sm border">
                        <h3 class="font-semibold text-gray-800 mb-2">Q: {{ $card->question }}</h3>
                        <p class="text-gray-700">A: {{ $card->answer }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">This deck has no flashcards yet.</p>
        @endif
    </div>
</x-app-layout>
