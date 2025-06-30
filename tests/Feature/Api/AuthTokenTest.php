<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('generates token with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('secret123'),
    ]);

    $response = $this->postJson('/api/token', [
        'email' => 'test@example.com',
        'password' => 'secret123',
        'device_name' => 'TestDevice',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure(['token']);
});

it('fails to generate token with invalid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('secret123'),
    ]);

    $response = $this->postJson('/api/token', [
        'email' => 'test@example.com',
        'password' => 'wrongpassword',
        'device_name' => 'TestDevice',
    ]);

    $response->assertStatus(401)
        ->assertJson(['message' => 'Invalid credentials']);
});

it('validates required fields', function () {
    $response = $this->postJson('/api/token', []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['email', 'password', 'device_name']);
});
