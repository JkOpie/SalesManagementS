<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'price' => $faker->randomDigit,
        'sales_price' => $faker->randomDigit,
        'quantity' => $faker->randomDigit,
    ];
});
