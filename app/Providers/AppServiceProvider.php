<?php

namespace App\Providers;

use App\Models\Deck;
use App\Models\Flashcard;
use App\Policies\DeckPolicy;
use App\Policies\FlashcardPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Deck::class => DeckPolicy::class,
        Flashcard::class => FlashcardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
