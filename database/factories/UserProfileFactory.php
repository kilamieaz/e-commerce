<?php

use Faker\Generator as Faker;
use App\UserProfile;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'phone_number' => $faker->numerify('08##########'),
    ];
});
