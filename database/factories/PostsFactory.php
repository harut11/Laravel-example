<?php

use Faker\Generator as Faker;

$factory->define(App\Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'image' => str_random() . 'jpg',
        'body' => $faker->paragraph,
    ];
});
