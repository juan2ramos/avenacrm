<?php

use Faker\Generator as Faker;
use Faker\Provider\es_Es\Text;

$factory->define(App\Models\Product::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'sale_value' => $faker->numberBetween(1000,5000),
        'description' => $faker->realText(150),
    ];
});
