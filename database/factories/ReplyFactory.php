<?php

use Faker\Generator as Faker;
use App\Reply;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'description' => $faker->lexify('Description Reply ???'),
    ];
});
