<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Deck;
use App\Models\Flashcard;
use App\Policies\DeckPolicy;
use App\Policies\FlashcardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Deck::class => DeckPolicy::class,
        Flashcard::class => FlashcardPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
