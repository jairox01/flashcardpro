<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-2xl font-semibold mb-4">Edit Flashcard</h2>
        <form method="POST" action="{{ route('flashcards.update', $flashcard) }}">
            @csrf @method('PUT')
            <div class="mb-4">
                <label for="deck_id" class="block text-sm font-medium text-gray-700">Deck</label>
                <select name="deck_id" id="deck_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @foreach ($decks as $id => $name)
                        <option value="{{ $id }}" @selected($id == $flashcard->deck_id)>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question', $flashcard->question) }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                <textarea name="answer" id="answer" rows="4" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ old('answer', $flashcard->answer) }}</textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                <a href="{{ route('flashcards.index') }}" class="ml-2 text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
