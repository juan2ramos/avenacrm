<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Inventory::class, function (Faker $faker) {
    $produced = $faker->numberBetween(1500, 2000);
    $dispatched = $faker->numberBetween(1500, $produced);
    return [
        'date' => $faker->dateTime(),
        'produced'=> $produced,
        'dispatched'=>$dispatched,
        'product_id'=>1,
    ];
});
