<?php

use Faker\Generator as Faker;

$factory->define(App\Entities\Local::class, function (Faker $faker) {
    return [
        'build' => strtoupper($faker->randomLetter),
        'floor' => $faker->randomNumber(1, true),
        'local' => $faker->randomNumber(3, true)
    ];
});
