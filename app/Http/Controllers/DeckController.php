<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Http\Requests\StoreDeckRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeckController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Deck::withCount('flashcards')
            ->where('user_id', auth()->id())
            ->paginate(9);

        return view('decks.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Deck::class);
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeckRequest $request)
    {
        $validated = $request->validated();
        $deck = auth()->user()->decks()->create([
            'name' => $validated['name'],
            'is_public' => boolval($validated['is_public'] ?? false),
        ]);
        return redirect()->route('decks.index')->with('success', 'Deck created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        $this->authorize('view', $deck);
        return view('decks.show', compact('deck'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deck $deck)
    {
        $this->authorize('update', $deck);
        return view('decks.edit', compact('deck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDeckRequest $request, Deck $deck)
    {
        $this->authorize('update', $deck);
        $validated = $request->validated();

        $deck->update([
            'name' => $validated['name'],
            'is_public' => boolval($request->input('is_public', false)),
        ]);
        return redirect()->route('decks.index')->with('success', 'Deck updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        $this->authorize('delete', $deck);
        $deck->delete();
        return redirect()->route('decks.index')->with('success', 'Deck deleted.');
    }
}
