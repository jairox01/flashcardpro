<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Http\Requests\StoreDeckRequest;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = auth()->user()->decks()->paginate(10);
        return view('decks.index', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeckRequest $request)
    {
        $deck = auth()->user()->decks()->create($request->validated());
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
        $deck->update($request->validated());
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
