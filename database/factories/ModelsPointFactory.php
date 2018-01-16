<?php

use Faker\Generator as Faker;
use Faker\Provider\es_Es\Address;

$factory->define(App\Models\Point::class, function (Faker $faker) {
    $faker->addProvider(new Address($faker));
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'area_id' => $faker->numberBetween(1, 5),
    ];
});
