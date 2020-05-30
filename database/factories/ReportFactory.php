<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'product_sku' => Product::all()->random()->sku,
        'type' => $faker->randomElement([1, 2]),
        'quantity' => $faker->numberBetween(1, 300),
        'method' => $faker->randomElement(['website', 'api'])
    ];
});
