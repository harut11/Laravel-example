<?php

use Faker\Generator as Faker;
use \App\User;
use \App\PostCategories;

$factory->define(App\Posts::class, function (Faker $faker) {
	$users = User::select('id')->get()->pluck('id');
	$categories = PostCategories::select('id')->get()->pluck('id');

    return [
        'title' => $faker->words(3, true),
        'image' => str_random() . '.jpg',
        'body' => $faker->paragraph,
        'owner_id' => $faker->randomElement($users),
        'category_id' => $faker->randomElement($categories),
    ];
});
