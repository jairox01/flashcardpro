<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PublicDeckController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\LogPublicApiRequests;

Route::middleware(['auth:sanctum', LogPublicApiRequests::class])->prefix('public')->group(function () {
    Route::get('/decks', [PublicDeckController::class, 'index']);
    Route::get('/decks/{deck}/flashcards', [PublicDeckController::class, 'flashcards']);
});

Route::post('/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken($request->device_name)->plainTextToken;

    return response()->json(['token' => $token]);
});
