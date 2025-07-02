<x-app-layout>
    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Deck</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('decks.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Deck Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_public" id="is_public"
                       class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                    {{ old('is_public') ? 'checked' : '' }}>
                <label for="is_public" class="ml-2 block text-sm text-gray-700">
                    Make this deck public
                </label>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('decks.index') }}" class="text-gray-600 hover:underline mr-4">Cancel</a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Deck</button>
            </div>
        </form>
    </div>
</x-app-layout>
