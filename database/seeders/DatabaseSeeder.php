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
        Post::factory(10)->state(function () {
            return [
                'user_id' => 1,
                'title' => rand(1000, 9999), // Better range, 0000 might be interpreted as octal or zero
            ];
        })->create();

        // Optional: create user manually
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('123456789'), // Always hash passwords
        // ]);
    }
}
