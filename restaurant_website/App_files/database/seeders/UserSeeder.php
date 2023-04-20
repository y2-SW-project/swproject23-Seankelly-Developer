<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),

        ]);

        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@restaurants.com',
            'password' => bcrypt('password123'),
            'role' => 'restaurant owner',
        ]);
    }
}
