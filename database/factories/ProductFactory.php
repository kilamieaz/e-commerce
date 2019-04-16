<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Product ???'),
        'description' => $faker->lexify('Description Product ???'),
        'image' => $faker->image('public/storage/files', 400, 300, null, false),
        'price' => $faker->randomNumber(5),
        'stock' => $faker->numberBetween(10, 20),
        'status' => 1,
    ];
});
