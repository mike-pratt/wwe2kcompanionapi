<?php

use Illuminate\Database\Seeder;

class RivalryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(\App\Models\v0\Rivalry::class)->create();
        }
    }
}
