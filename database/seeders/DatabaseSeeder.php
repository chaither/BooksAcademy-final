<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@booksacademy.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'dashboard_title' => 'Author Onboarding Workspace',
                'dashboard_content' => 'Welcome to Books Academy! Your draft is currently under review by our design and illustration editorial board. Please check back soon.',
                'email_verified_at' => now(),
            ]);
        }
    }
}
