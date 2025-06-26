<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Deck;
use App\Models\Flashcard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(2)
            ->has(
                Deck::factory()
                    ->count(2)
                    ->has(Flashcard::factory()->count(3))
            )
            ->create();
    }
}
