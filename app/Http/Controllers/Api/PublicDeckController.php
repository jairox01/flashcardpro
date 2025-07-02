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
        return response()->json([
            'data' => Deck::where('is_public', true)->get()
        ]);
    }

    public function flashcards(Deck $deck)
    {
        if (! $deck->is_public) {
            abort(403, 'Deck is not public.');
        }

        return response()->json([
            'data' => $deck->flashcards()->where('is_public', true)->get()
        ]);
    }
}
