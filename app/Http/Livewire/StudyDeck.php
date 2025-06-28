<?php
namespace App\Http\Livewire;

use App\Models\Deck;
use Livewire\Component;

class StudyDeck extends Component
{
    public $decks;
    public $selectedDeckId;
    public $currentCard;
    public $showAnswer = false;
    public $remainingCards = [];

    public function mount()
    {
        $this->decks = auth()->user()->decks()->with('flashcards')->get();

        if ($this->decks->count() === 1) {
            $this->selectedDeckId = $this->decks->first()->id;
            $this->selectDeck();
        }
    }

    public function selectDeck()
    {
        $deck = $this->decks->firstWhere('id', $this->selectedDeckId);

        if (!$deck || $deck->user_id !== auth()->id()) {
            abort(403);
        }

        $this->remainingCards = $deck->flashcards->shuffle()->all();
        $this->nextCard();
    }

    public function nextCard()
    {
        $this->showAnswer = false;

        if (count($this->remainingCards) > 0) {
            $this->currentCard = array_shift($this->remainingCards);
        } else {
            $this->currentCard = null;
        }
    }

    public function showAnswer()
    {
        $this->showAnswer = true;
    }

    public function render()
    {
        return view('livewire.study-deck');
    }
}
