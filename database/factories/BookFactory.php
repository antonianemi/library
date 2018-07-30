<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'type_of_paper' => 'paperback',
        'publisher' => null,
        'language' => 'en',
        'isbn_10' => $faker->isbn10,
        'isbn_13' => $faker->isbn13,
        'product_dimensions' => null,
        'weight' => null,
        'description' => null,
    ];
});
