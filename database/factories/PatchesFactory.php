<?php

use Faker\Generator as Faker;
use App\Entities\Patch as Model;
use App\Entities\Rack;
use App\Entities\Local;

$factory->define(Model::class, function (Faker $faker) {
    
    $racks = Rack::all()->pluck('id');
    $locals = Local::all()->pluck('id');

    return [
        'label' => $faker->regexify('^[0-9]{2}[A-Z]-[0-9]{2}-[0-9]{2}?'),
        'number' => $faker->randomNumber(2),
        'switch_port' => $faker->randomNumber(2),
        'rack_id' => $faker->randomElement($racks),
        'local_id' => $faker->randomElement($locals),
    ];
});
