<?php

namespace Database\Seeders;

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
        \App\Models\Day::factory(5)->create();
        \App\Models\Tournament::factory(3)->create();
        \App\Models\Player::factory(30)->create();
        \App\Models\Game::factory(10)->create();
    }
}
