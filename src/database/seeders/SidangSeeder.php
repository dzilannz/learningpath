<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sidang')->insert([
            [
                'mahasiswa_id' => 1, // Mahasiswa pertama
                'seminar_kp' => false,
                'sempro' => false,
                'kompre' => false,
                'kolokium' => false,
                'munaqasyah' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

