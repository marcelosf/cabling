<?php

use Faker\Generator as Faker;
use App\Entities\Rack;
use App\Entities\VoicePort as Model;

$factory->define(Model::class, function (Faker $faker) {
    
    $racks = Rack::all()->pluck('id');
    
    return [
        'voiceport_number' => $faker->randomNumber(),
        'central' => $faker->randomNumber(),
        'distribution' => $faker->randomNumber(),
        'rack_id' => $faker->randomElement($racks),
    ];
});
