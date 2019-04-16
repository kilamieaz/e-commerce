<?php

use Faker\Generator as Faker;
use App\Transaction;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'quantity' => $faker->numberBetween(2, 5),
        'total' => $faker->randomNumber(5),
        'status' => 1,
    ];
});
