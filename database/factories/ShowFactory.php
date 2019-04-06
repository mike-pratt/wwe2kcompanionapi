<?php

use Faker\Generator as Faker;

$factory->define(App\Models\v0\Show::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'primary_display' => $faker->boolean(50)
    ];
});