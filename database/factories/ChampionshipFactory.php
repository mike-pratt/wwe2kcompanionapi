<?php

use Faker\Generator as Faker;

$factory->define(App\Models\v0\Championship::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'level' => $faker->jobTitle,
        'show_id' => $faker->numberBetween(1, 3),
        'wrestler_id' => $faker->numberBetween(1, 9)
    ];
});
