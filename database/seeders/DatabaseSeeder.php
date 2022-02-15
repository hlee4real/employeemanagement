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
        // User::factory(10)->create();
        \App\Models\Employee::factory(20)->create();

        \App\Models\Department::factory(20)->create();

        \App\Models\Manager::factory(20)->create();
    }
}
