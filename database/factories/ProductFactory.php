<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Product ???'),
        'description' => $faker->lexify('Description Product ???'),
        'image' => $faker->image('public/storage/files', 800, 800, 'cats', false),
        'price' => $faker->randomNumber(3),
        'stock' => $faker->numberBetween(10, 20),
        'rating' => $faker->numberBetween(1, 5),
        'sold' => $faker->randomNumber(2),
        'status' => 1,
    ];
});
