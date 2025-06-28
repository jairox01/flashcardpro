<?php
use App\Http\Livewire\StudyDeck;
use App\Models\User;
use App\Models\Deck;
use App\Models\Flashcard;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders the study deck page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/study');

    $response->assertStatus(200);
    $response->assertSee('Select a Deck'); // O cualquier texto visible en la vista
});

it('renders the study deck component', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/study')
        ->assertStatus(200);
});

it('loads decks and flashcards for authenticated user', function () {
    $user = User::factory()->create();
    $deck = Deck::factory()->for($user)->create();
    Flashcard::factory()->count(5)->for($deck)->create();

    Livewire::actingAs($user)
        ->test(StudyDeck::class)
        ->set('selectedDeckId', $deck->id)
        ->call('selectDeck')
        ->assertSet('currentCard', function ($card) {
            return !is_null($card);
        });
});
