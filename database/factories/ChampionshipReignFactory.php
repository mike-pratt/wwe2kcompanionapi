<?php

use Faker\Generator as Faker;

$factory->define(App\Models\v0\ChampionshipReign::class, function (Faker $faker) {
    return [
        'championship_id' => $faker->numberBetween(1, 10),
        'wrestler_id' => $faker->numberBetween(1, 10),
        'days' => $faker->numberBetween(1, 456)
    ];
});