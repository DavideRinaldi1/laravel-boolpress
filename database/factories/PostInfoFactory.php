<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInfo;
use Faker\Generator as Faker;

$factory->define(PostInfo::class, function (Faker $faker) {
    return [
        'post_id' => $faker->unique()->numberBetween(1, 50),
        'description' => $faker->text(),
        'slug' => $faker->slug(),
    ];
});
