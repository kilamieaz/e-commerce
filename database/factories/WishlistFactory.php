<?php

use Faker\Generator as Faker;
use App\Wishlist;

$factory->define(Wishlist::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(2, 5),
        'total' => $faker->randomNumber(5),
    ];
});
