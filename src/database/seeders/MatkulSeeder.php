<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */public function run(): void
    {
        DB::table('matkul')->insert([
            // Data untuk Semester 1
            [
                'nama' => 'Kalkulus',
                'sks' => 3,
                'semester_id' => 1, // Sesuaikan ID semester
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dasar Pemrograman',
                'sks' => 2,
                'semester_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fisika Dasar',
                'sks' => 2,
                'semester_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data untuk Semester 2
            [
                'nama' => 'Algoritma dan Pemrograman',
                'sks' => 3,
                'semester_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Matematika Diskrit',
                'sks' => 3,
                'semester_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kalkulus II',
                'sks' => 3,
                'semester_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data untuk Semester 3
            [
                'nama' => 'Aljabar Linier',
                'sks' => 3,
                'semester_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Logika Komputasional',
                'sks' => 3,
                'semester_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Teori Bahasa dan Otomata',
                'sks' => 3,
                'semester_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}





