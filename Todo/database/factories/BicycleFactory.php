<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;

$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,50),
        'brand'=>$faker->userName,
        'model'=>$faker->lastName,
        'color'=>$faker->colorName,
        'price'=>$faker->numberBetween(50,5000),
    ];
});
