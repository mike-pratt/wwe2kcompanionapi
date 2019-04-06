<?php

use Illuminate\Database\Seeder;

class ChampionshipReignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(\App\Models\v0\ChampionshipReign::class)->create();
        }
    }
}
