<?php

use Faker\Generator as Faker;
use App\Entities\Rack as Model;
use App\Entities\Local;

$factory->define(Model::class, function (Faker $faker) {
    
    $local = Local::all()->pluck('id');
    
    return [
        'name' => $faker->randomLetter,
        'local_id' => $faker->randomElement($local),
        'size' => '48',
    ];
});
