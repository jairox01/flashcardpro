<?php

use App\Http\Controllers\Api\PublicDeckController;

Route::middleware('auth:sanctum')->prefix('public')->group(function () {
    Route::get('/decks', [ PublicDeckController::class, 'index'] );
    Route::get('/decks/{deck}/flashcards', [ PublicDeckController::class, 'flashcards']);
});

Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken($request->device_name)->plainTextToken;

    return response()->json(['token' => $token]);
});
