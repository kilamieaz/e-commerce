<?php

use Faker\Generator as Faker;
use App\UserProfile;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->email,
        'last_name' => bcrypt(str_random(10)),
        'address' => bcrypt(str_random(10)),
        'phone_number' => bcrypt(str_random(10)),
    ];
});
