<div class="max-w-3xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Study Flashcards</h2>

    <!-- Deck selector -->
    <div class="mb-6">
        <label for="deck" class="block text-sm font-medium text-gray-700 mb-1">Select a Deck</label>
        <select wire:model="selectedDeckId" id="deck"
                class="block w-full border-gray-300 rounded-md shadow-sm"
                wire:change="selectDeck">
            <option value="">-- Choose a Deck --</option>
            @foreach ($decks as $deck)
                <option value="{{ $deck->id }}">{{ $deck->name }}</option>
            @endforeach
        </select>
        @if ($statusMessage)
            <div class="mt-2 text-sm text-gray-500 italic">
                {{ $statusMessage }}
            </div>
        @endif
    </div>

    <!-- Card display -->
    @if ($currentCard)
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-xl font-semibold mb-4 text-gray-800">Question</h3>
            <p class="text-gray-700 text-lg">{{ $currentCard->question }}</p>

            @if ($showAnswer)
                <div class="mt-4">
                    <h4 class="text-md font-semibold text-green-600">Answer</h4>
                    <p class="text-gray-700">{{ $currentCard->answer }}</p>
                </div>
            @else
                <button wire:click="revealAnswer"
                        class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                    Show Answer
                </button>
            @endif

            <div class="mt-4">
                <button wire:click="nextCard"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded">
                    Next Card
                </button>
            </div>
        </div>
    @elseif ($selectedDeckId)
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">You’ve reached the end of this deck.</h3>
            <p class="text-gray-600 mb-6">Want to go again or try another deck?</p>

            <div class="flex justify-center gap-4">
                <button wire:click="selectDeck"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                    Restart Deck
                </button>
                <button wire:click="$set('selectedDeckId', null)"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded">
                    Choose Another Deck
                </button>
            </div>
        </div>
    @endif
</div>
