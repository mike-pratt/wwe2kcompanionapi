<?php

use Faker\Generator as Faker;

$factory->define(App\Models\v0\Wrestler::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'height' => $faker->name,
        'weight' => $faker->numberBetween(100, 600),
        'hometown' => $faker->city,
        'show_id' => $faker->numberBetween(1, 3)
    ];
});
