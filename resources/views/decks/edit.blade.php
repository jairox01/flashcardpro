<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <h2 class="text-2xl font-semibold mb-6">Edit Deck</h2>

        <form method="POST" action="{{ route('decks.update', $deck) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $deck->name) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center">
                <input type="hidden" name="is_public" value="0">
                <input type="checkbox" name="is_public" id="is_public" value="1"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                    {{ old('is_public', $deck->is_public) ? 'checked' : '' }}>
                <label for="is_public" class="ml-2 block text-sm text-gray-700">
                    Make this deck public
                </label>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('decks.index') }}" class="text-gray-600 hover:underline mr-4">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update Deck</button>
            </div>
        </form>
    </div>
</x-app-layout>
