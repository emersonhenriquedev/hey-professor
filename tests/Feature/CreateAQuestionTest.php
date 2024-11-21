<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should create a new question bigger than 255 characters', function () {
    // arrange
    $user = User::factory()->create();
    actingAs($user);

    // act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // assert
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);
});

it('should create as a draft all the time', function () {
    // arrange
    $user = User::factory()->create();
    actingAs($user);

    // act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // assert
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?', 'draft' => true]);
});

it('should check if ends a question mark ?', function () {
    // arrange
    $user = User::factory()->create();
    actingAs($user);

    // act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 10),
    ]);

    // assert
    $request->assertSessionHasErrors(['question' => 'Are you sure that is a question? It is missing the question mark in the end.']);
    assertDatabaseCount('questions', 0);
});

it('should have at least 10 chacracters', function () {
    // arrange
    $user = User::factory()->create();
    actingAs($user);

    // act
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 8) . '?',
    ]);

    // assert
    $request->assertSessionHasErrors(['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]);
    assertDatabaseCount('questions', 0);
});
