<?php

use App\Models\User;
use App\Models\Deck;
use App\Models\Flashcard;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns public decks for authenticated users', function () {
    $user = User::factory()->create();

    Deck::factory()->count(2)->create([
        'is_public' => true,
        'user_id' => $user->id,
    ]);

    $token = $user->createToken('test')->plainTextToken;

    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/public/decks');

    $response->assertStatus(200)
        ->assertJsonCount(2, 'data');
});

it('returns flashcards from a public deck', function () {
    $user = User::factory()->create();
    $deck = Deck::factory()->create([
        'is_public' => true,
        'user_id' => $user->id,
    ]);

    Flashcard::factory()->count(3)->create([
        'deck_id' => $deck->id,
    ]);

    $token = $user->createToken('test')->plainTextToken;

    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson("/api/public/decks/{$deck->id}/flashcards");

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data');
});

it('denies access without a token', function () {
    $response = $this->getJson('/api/public/decks');
    $response->assertStatus(401);
});
