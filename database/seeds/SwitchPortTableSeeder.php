<?php

use Illuminate\Database\Seeder;

class SwitchPortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\SwitchPort::class, 100)->create();
    }
}
