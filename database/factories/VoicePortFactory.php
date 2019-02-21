<?php

use Faker\Generator as Faker;
use App\Entities\Rack;
use App\Entities\VoicePort as Model;
use App\Entities\Patch;

$factory->define(Model::class, function (Faker $faker) {
    
    $racks = Rack::all()->pluck('id');
    
    return [
        'voiceport_number' => $faker->randomNumber(),
        'central' => $faker->randomNumber(),
        'distribution' => $faker->randomNumber(),
        'rack_id' => $faker->randomElement($racks),
        'patch_id' => $faker->randomElement(Patch::all()->pluck('id'))
    ];
});
