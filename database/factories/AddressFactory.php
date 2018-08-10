<?php

use Faker\Generator as Faker;

$factory->define(\App\Address::class, function (Faker $faker) {
    return [
        'state' => $faker->country,
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'county' => $faker->country,
        'number' => $faker->randomNumber(3),
        'street' => $faker->streetAddress,
        'zip_code' => '11111',
    ];
});
