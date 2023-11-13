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
        \App\Models\Incoming::factory(1000)->create();
        \App\Models\Outcoming::factory(1000)->create();
        \App\Models\Digital::factory(1000)->create();
    }
}
