<?php

use Illuminate\Database\Seeder;

class ShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('shows')->truncate();

        for ($i = 0; $i < 3; $i++) {
            factory(\App\Models\v0\Show::class)->create();
        }
    }
}
