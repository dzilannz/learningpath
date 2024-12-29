<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@example.com',
        ]);

        $this->call([
            MahasiswaSeeder::class,
            SemesterSeeder::class,
            MatkulSeeder::class,
            MahasiswaMatkulSeeder::class,
            MahasiswaSemesterSeeder::class,
            IbtitahSeeder::class,
            SidangSeeder::class,
            AdminSeeder::class
            // Seeder lain dapat ditambahkan di sini.
        ]);
       
    }

    
}
