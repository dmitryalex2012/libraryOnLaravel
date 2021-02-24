<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\app\Models\Books;
use Faker\Generator as Faker;

$factory->define(Books::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'author' => $faker->name,
        'description' => $faker->realText(rand(100, 150)),
        'bookCover' => $faker->imageUrl($width = 240, $height = 320),
        'category' => str_random(10),
        'language' => str_random(10),
    ];
});
