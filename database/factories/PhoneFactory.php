<?php

use Faker\Generator as Faker;

$factory->define(\App\Phone::class, function (Faker $faker) {
    return [
        'cellphone_number' => $faker->phoneNumber,
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});
