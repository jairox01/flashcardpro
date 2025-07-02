<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Flashcard</h2>

        <form method="POST" action="{{ route('flashcards.update', $flashcard) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Deck Selection -->
            <div>
                <label for="deck_id" class="block text-sm font-medium text-gray-700">Deck</label>
                <select name="deck_id" id="deck_id" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach ($decks as $deck)
                        <option value="{{ $deck->id }}" {{ $flashcard->deck_id == $deck->id ? 'selected' : '' }}>
                            {{ $deck->name }}
                        </option>
                    @endforeach
                </select>
                @error('deck_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Question -->
            <div>
                <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question', $flashcard->question) }}"
                       required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('question')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Answer -->
            <div>
                <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                <textarea name="answer" id="answer" rows="4" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('answer', $flashcard->answer) }}</textarea>
                @error('answer')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Public -->
            <div class="flex items-center">
                <input type="hidden" name="is_public" value="0">
                <input type="checkbox" name="is_public" id="is_public" value="1"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                    {{ old('is_public', $flashcard->is_public) ? 'checked' : '' }}>
                <label for="is_public" class="ml-2 block text-sm text-gray-700">
                    Make this card public
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <a href="{{ route('flashcards.index') }}" class="text-gray-600 hover:underline mr-4">Cancel</a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded">
                    Update Flashcard
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
