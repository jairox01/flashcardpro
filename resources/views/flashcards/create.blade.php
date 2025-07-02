<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Flashcard</h2>

        <form method="POST" action="{{ route('flashcards.store') }}" class="space-y-6">
            @csrf

            <!-- Deck Selection -->
            <div class="mb-4">
                <label for="deck_id" class="block text-sm font-medium text-gray-700">Select Deck</label>
                <select name="deck_id" id="deck_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">-- Choose a deck --</option>
                    @foreach ($decks as $deck)
                        <option value="{{ $deck->id }}" {{ old('deck_id') == $deck->id ? 'selected' : '' }}>
                            {{ $deck->name }}
                        </option>
                    @endforeach
                </select>

                @error('deck_id')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Question -->
            <div>
                <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question') }}"
                       required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('question')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Answer -->
            <div>
                <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                <textarea name="answer" id="answer" rows="4" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('answer') }}</textarea>
                @error('answer')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Public -->
            <div class="flex items-center">
                <input type="checkbox" name="is_public" id="is_public" value="1"
                       {{ old('is_public') ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 shadow-sm">
                <label for="is_public" class="ml-2 block text-sm text-gray-700">
                    Make this card public
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <a href="{{ route('flashcards.index') }}" class="text-gray-600 hover:underline mr-4">Cancel</a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded">
                    Create Flashcard
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
