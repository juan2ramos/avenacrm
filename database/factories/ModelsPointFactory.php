<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Point::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'area_id' => $faker->numberBetween(1, 5),
    ];
});
