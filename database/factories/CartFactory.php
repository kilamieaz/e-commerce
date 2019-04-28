<?php

use Faker\Generator as Faker;
use App\Cart;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(2, 5),
        'total' => $faker->randomNumber(3),
    ];
});
