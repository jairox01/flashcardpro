<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Models\Deck;

class StoreFlashcardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:1000'],
            'deck_id' => ['required', 'exists:decks,id'],
            'is_public' => ['nullable', 'boolean'],
        ];
    }

    public function withValidator(\Illuminate\Validation\Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $deckId = $this->input('deck_id');

            if ($deckId) {
                $deck = Deck::find($deckId);
                if (! $deck || $deck->user_id !== auth()->id()) {
                    $validator->errors()->add('deck_id', 'You do not own the selected deck.');
                }
            }
        });
    }
}
