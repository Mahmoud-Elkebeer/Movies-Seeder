<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define( Category::class, function (Faker $faker) {
    return [
        'category_id' => $faker->randomDigit,
        'name' => $faker->name,
    ];
});
