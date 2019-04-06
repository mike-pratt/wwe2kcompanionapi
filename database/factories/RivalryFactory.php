<?php

use Faker\Generator as Faker;

$factory->define(App\Models\v0\Rivalry::class, function (Faker $faker) {
    return [
        'wrestler_id' => 1,
        'rival_id' => $faker->numberBetween(2, 9),
        'level' => $faker->numberBetween(1, 5),
        'length' => $faker->name,
        'active' => $faker->boolean
    ];
});