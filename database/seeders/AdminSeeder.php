<?php

namespace Database\Seeders;;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@bookbuybd.com',
            'password' => Hash::make('super12345'),
            'user_type' => 'superadmin',
        ]);
    }
}
