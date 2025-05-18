<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\UserTypeSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserTypeSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
