<?php

use Illuminate\Database\Seeder;


class RacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Rack::class, 10)->create();
    }
}
