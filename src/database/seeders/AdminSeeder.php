<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'nip' => '1234567891', // NIP Admin
                'name' => 'admin',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password123'), // Password terenkripsi
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
