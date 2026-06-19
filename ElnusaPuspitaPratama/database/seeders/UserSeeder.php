<?php
// filepath: database/seeders/UserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user - can manage projects & reviews
        User::factory()->create([
            'name' => 'Admin Elnusa',
            'email' => 'admin@elnusa.com',
        ]);

        // Manager user - can manage everything (projects, reviews, employees)
        User::factory()->create([
            'name' => 'Manager Elnusa',
            'email' => 'manager@elnusa.com',
        ]);
    }
}