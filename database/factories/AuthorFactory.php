<?php

use Faker\Generator as Faker;

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'middle_name' => $faker->name,
        'last_name' => $faker->lastName,
        'mothers_last_name' => $faker->lastName,
    ];
});
