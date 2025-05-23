<?php

namespace Database\Seeders;

use App\Models\Post;
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
        // Optional: create user manually
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '005335051',
            'password' => bcrypt('123456789'), // Always hash passwords
        ]);
    }
}
