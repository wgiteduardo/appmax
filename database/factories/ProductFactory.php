<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->swiftBicNumber(),
        'title' => $faker->sentence(3),
        'price' => $faker->randomFloat(2, 0, 1000),
        'stock' => $faker->numberBetween(80, 300)
    ];
});
