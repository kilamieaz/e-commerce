<?php

use Faker\Generator as Faker;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'description' => $faker->lexify('Description Comment ???'),
        'value' => $faker->numberBetween(1, 5),
    ];
});
