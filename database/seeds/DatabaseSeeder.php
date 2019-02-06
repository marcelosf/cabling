<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LocalsTableSeeder::class,
            RacksTableSeeder::class,
            PatchesTableSeeder::class,
            SwitchPortTableSeeder::class,
            VoicePortTableSeeder::class,
        ]);
    }
}
