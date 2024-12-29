<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MahasiswaSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_semester')->insert([
            [
                'mahasiswa_id' => 1, // ID mahasiswa dari tabel mahasiswa
                'semester_id' => 1,  // ID semester dari tabel semester
                'sks_diambil' => 22, // Total SKS yang diambil mahasiswa di semester 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, 
                'semester_id' => 2,
                'sks_diambil' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
