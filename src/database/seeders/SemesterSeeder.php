<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semester')->insert([
            [
                'nama' => 'Semester 1',
                'sks_total' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 2',
                'sks_total' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 3',
                'sks_total' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 4',
                'sks_total' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 5',
                'sks_total' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 6',
                'sks_total' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 7',
                'sks_total' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Semester 8',
                'sks_total' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
