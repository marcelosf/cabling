<?php

use Faker\Generator as Faker;
use App\Entities\SwitchPort as Model;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'port_number' => $faker->unique()->randomDigit(),
        'poe' => $faker->boolean(),
        'poe_status' => $faker->boolean(),
        'vlan' => $faker->randomNumber(2),
        'switch_name' => $faker->regexify('[A-Z]_[A-Z]{3}_[A-Z]\d_\d'),
        'switch_brand' => $faker->randomElement(['Cisco', 'Dell']),
        'switch_code' => $faker->randomNumber(4),
        'stack_name' => $faker->regexify('[A-Z]_[A-Z]{3}_HP5120-G_[A-Z]\d'),
        'stack_ip' => $faker->ipv4,
        'rack_id' => $faker->randomElement(Rack::all()->pluck('id')),
    ];
});
