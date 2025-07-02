<?php
namespace App\Livewire;

use Livewire\Component;

class StudyDeck extends Component
{
    public $decks;
    public $selectedDeckId;
    public $currentCard;
    public $showAnswer = false;
    public $remainingCards = [];

    public $statusMessage;

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
        if (empty($this->selectedDeckId)) {
            $this->currentCard = null;
            $this->remainingCards = [];
            $this->showAnswer = false;
            $this->statusMessage = 'No deck selected.';
            return;
        }

        $deck = $this->decks->firstWhere('id', $this->selectedDeckId);

        if (!$deck || $deck->user_id !== auth()->id()) {
            abort(403);
        }

        $this->remainingCards = $deck->flashcards->shuffle()->all();
        $this->nextCard();
        $this->statusMessage = null;
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

    public function revealAnswer()
    {
        $this->showAnswer = true;
    }

    public function restartDeck()
    {
        $this->selectDeck();
    }

    public function render()
    {
        return view('livewire.study-deck')->layout('layouts.app');
    }
}
