<?php

use Illuminate\Database\Seeder;

class WrestlerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('wrestlers')->truncate();
        for ($i = 0; $i < 10; $i++) {
            factory(\App\Models\v0\Wrestler::class)->create();
        }
    }
}
