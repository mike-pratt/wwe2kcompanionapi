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
        $this->call(UsersTableSeeder::class);
        $this->call(ShowTableSeeder::class);
        $this->call(WrestlerTableSeeder::class);
        $this->call(ChampionshipTableSeeder::class);
        $this->call(ChampionshipReignTableSeeder::class);
        $this->call(RivalryTableSeeder::class);
    }
}
