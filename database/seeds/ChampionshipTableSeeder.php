<?php

use Illuminate\Database\Seeder;

class ChampionshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('championships')->truncate();

        for ($i = 0; $i < 10; $i++) {
            factory(\App\Models\v0\Championship::class)->create();
        }
    }
}
