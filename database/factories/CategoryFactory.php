<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Category ???'),
        'description' => $faker->lexify('Description Category ???'),
        'image' => $faker->image('public/storage/files', 400, 300, null, false),
        'status' => 1,
    ];
});
