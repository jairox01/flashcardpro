<div class="p-6 max-w-2xl mx-auto space-y-6">
    <div>
        <label for="deck" class="block text-sm font-medium text-gray-700">Select a Deck</label>
        <select wire:model="selectedDeckId" id="deck" class="mt-1 block w-full rounded-md" wire:change="selectDeck">
            <option value="">-- Choose a Deck --</option>
            @foreach ($decks as $deck)
                <option value="{{ $deck->id }}">{{ $deck->name }}</option>
            @endforeach
        </select>
    </div>

    @if ($currentCard)
        <div class="p-6 bg-white rounded shadow text-center">
            <h2 class="text-xl font-semibold mb-4">Question</h2>
            <p class="text-gray-800 text-lg">{{ $currentCard->question }}</p>

            @if ($showAnswer)
                <div class="mt-4">
                    <h3 class="text-md font-medium text-green-700">Answer</h3>
                    <p class="text-gray-700">{{ $currentCard->answer }}</p>
                </div>
            @else
                <button wire:click="showAnswer" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
                    Show Answer
                </button>
            @endif

            <div class="mt-4">
                <button wire:click="nextCard" class="px-4 py-2 bg-gray-600 text-white rounded">
                    Next Card
                </button>
            </div>
        </div>
    @endif
</div>
