<?php

namespace App\Http\Controllers;
use App\Models\Flashcard;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
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
    public function create()
    {
        $decks = auth()->user()->decks()->pluck('name', 'id');
        return view('flashcards.create', compact('decks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlashcardRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Flashcard::create($validated);

        return redirect()->route('flashcards.index')->with('success', 'Flashcard created.');
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
        $decks = auth()->user()->decks()->pluck('name', 'id');

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
