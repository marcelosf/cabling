<?php

use Faker\Generator as Faker;
use App\Entities\Phone as Model;
use App\Entities\VoicePort;
use App\Entities\SwitchPort;

$factory->define(Model::class, function (Faker $faker) {

    $voice_panels = VoicePort::all()->pluck('id');
    $switch_ports = SwitchPort::all()->pluck('id');

    return [
        'number' => $faker->randomNumber(4),
        'category' => $faker->randomElement(['interno', 'ddd', 'ddi']),
        'voicepanel_id' => $faker->randomElement($voice_panels),
        'switchport_id' => $faker->randomElement($switch_ports),
    ];
});
