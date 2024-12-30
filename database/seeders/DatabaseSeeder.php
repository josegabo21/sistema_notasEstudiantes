<?php

namespace Database\Seeders;

use App\Models\Profesor;
use App\Models\student;
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

        Profesor::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>bcrypt("12345678")
        ]);

        student::factory(20)->create();
    }
}
