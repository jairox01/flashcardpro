<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Flashcard;
use Illuminate\Http\Request;
use App\Models\Deck;
use App\Http\Requests\StoreFlashcardRequest;

class FlashcardController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flashcards = auth()->user()->flashcards()->with('deck')->paginate(10);
        return view('flashcards.index', compact('flashcards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', Flashcard::class);
        $decks = auth()->user()->decks()->orderBy('name')->get();
        return view('flashcards.create', compact('decks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', \App\Models\Flashcard::class);

        $validated = $request->validate([
            'deck_id' => ['required', 'exists:decks,id'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'is_public' => ['nullable', 'boolean'],
        ]);

        $deck = Deck::where('id', $validated['deck_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $deck->flashcards()->create([
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'is_public' => boolval($validated['is_public'] ?? false),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('decks.show', $deck)->with('success', 'Flashcard created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flashcard $flashcard)
    {
        $this->authorize('update', $flashcard);
        $decks = auth()->user()->decks()->orderBy('name')->get();
        return view('flashcards.edit', compact('flashcard', 'decks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFlashcardRequest $request, Flashcard $flashcard)
    {
        $this->authorize('update', $flashcard);
        $flashcard->update($request->validated());

        return redirect()->route('flashcards.index')->with('success', 'Flashcard updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flashcard $flashcard)
    {
        $this->authorize('delete', $flashcard);
        $flashcard->delete();

        return redirect()->route('flashcards.index')->with('success', 'Flashcard deleted.');
    }
}
