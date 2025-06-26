<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'is_public',
        'deck_id',
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }
}
