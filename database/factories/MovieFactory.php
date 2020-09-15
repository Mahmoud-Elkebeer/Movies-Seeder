<?php

use App\Models\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->randomDigit,
        'title' => $faker->title,
        'popularity' => $faker->randomFloat(),
        'vote_count' => $faker->randomDigit,
        'vote_average' => $faker->randomFloat(),
        'release_date' => $faker->date(),
    ];
});
