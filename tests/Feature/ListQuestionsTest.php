<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    // arrange
    $user      = User::factory()->create();
    $questions = Question::factory()->count(5)->create();
    actingAs($user);

    // act
    $response = get(route('dashboard'));

    // assert

    /**
     * @var Question $q
     */
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }
});
