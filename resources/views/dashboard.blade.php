<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Welcome back! 👋</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <a href="{{ route('decks.index') }}" class="block p-6 bg-white shadow hover:shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-blue-600">📚 Manage Decks</h3>
                <p class="text-sm text-gray-500 mt-2">View, create, and organize your decks.</p>
            </a>

            <a href="{{ route('flashcards.index') }}" class="block p-6 bg-white shadow hover:shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-yellow-600">🧠 Manage Flashcards</h3>
                <p class="text-sm text-gray-500 mt-2">Add or edit your learning cards.</p>
            </a>

            <a href="{{ route('study') }}" class="block p-6 bg-white shadow hover:shadow-md rounded-lg">
                <h3 class="text-lg font-semibold text-green-600">🎓 Study Mode</h3>
                <p class="text-sm text-gray-500 mt-2">Practice using flashcards interactively.</p>
            </a>
        </div>
    </div>
</x-app-layout>
