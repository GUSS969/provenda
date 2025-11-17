<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ========== SEED USER DEFAULT ============
        User::firstOrCreate(
            ['email' => 'provenda@gmail.com'], // Cek email dulu
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Password default
                'email_verified_at' => now(),
            ]
        );

        // ========== SEED USER RANDOM ==========
        User::factory(10)->create(); // 10 user random
    }
}
