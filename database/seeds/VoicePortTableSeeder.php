<?php

use Illuminate\Database\Seeder;
use App\Entities\VoicePort;

class VoicePortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VoicePort::class, 100)->create();
    }
}
