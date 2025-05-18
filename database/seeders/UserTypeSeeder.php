<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_type')->insert([
            ['type' => 'admin'],
            ['type' => 'user'],
            ['type' => 'guest'],
            ['type' => 'superadmin'],
            ['type' => 'moderator'],
        ]);
    }
}
