<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeckResource;
use App\Http\Resources\FlashcardResource;
use App\Models\Deck;

class PublicDeckController extends Controller
{
    public function index()
    {
        $decks = Deck::where('is_public', true)->get();
        return DeckResource::collection($decks);
    }

    public function flashcards(Deck $deck)
    {
        if (! $deck->is_public) {
            abort(403, 'This deck is private.');
        }

        return FlashcardResource::collection($deck->flashcards);
    }
}
