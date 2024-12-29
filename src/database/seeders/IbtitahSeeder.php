<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IbtitahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        DB::table('ibtitah')->truncate();

        DB::table('ibtitah')->insert([
            [
                'mahasiswa_id' => 1, // Mahasiswa pertama
                'tilawah' => false,
                'ibadah' => false,
                'tahfidz' => false,
                'status' => 'approved',
                'proof_file' => 'proof_1.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
