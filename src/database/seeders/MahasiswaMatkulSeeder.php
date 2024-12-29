<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_matkul')->insert([
            [
                'mahasiswa_id' => 1, // Mahasiswa pertama
                'matkul_id' => 1,    // Mata kuliah pertama
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 2,
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, // Mahasiswa kedua
                'matkul_id' => 3,
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 4,
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, // Mahasiswa ketiga
                'matkul_id' => 5,
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 6,
                'status' => 'diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 7,
                'status' => 'belum diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 8,
                'status' => 'belum diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1,
                'matkul_id' => 9,
                'status' => 'belum diambil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
