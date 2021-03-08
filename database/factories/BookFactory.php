<?php

/** @var Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30),
        'author' => $faker->firstName . $faker->lastName,
        'description' => $faker->realText(rand(100, 150)),
        'bookCover' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'category' => $faker->word(),
        'language' => $faker->country,
        'publishingYear' => $faker->year('-1 year'),
        'created_at' => $faker->dateTimeBetween('-60 days', '-30 days'),
        'updated_at' => $faker->dateTimeBetween('-20 days', '-1 days'),
    ];
});
