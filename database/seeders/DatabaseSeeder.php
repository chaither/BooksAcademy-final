<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserWeeklyRoyalty;
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
        if (! User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password123'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
        }

        if (! User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'dashboard_title' => 'Author Onboarding Workspace',
                'dashboard_content' => null,
                'email_verified_at' => now(),
            ]);
        }

        if (! User::where('email', 'chaither@chaither.com')->exists()) {
            User::create([
                'name' => 'chaither',
                'email' => 'chaither@chaither.com',
                'password' => bcrypt('password'),
                'dashboard_title' => 'Author Onboarding Workspace',
                'dashboard_content' => null,
                'email_verified_at' => now(),
            ]);
        }

        // Seed default May 2025 weekly royalties for regular authors
        $regularUsers = User::where('is_admin', false)->get();
        foreach ($regularUsers as $u) {
            $defaultWeeks = [
                ['week_number' => 1, 'period_label' => 'May 1 – May 7', 'books_sold' => 52, 'royalty_amount' => 2750.00, 'status' => 'Paid'],
                ['week_number' => 2, 'period_label' => 'May 8 – May 14', 'books_sold' => 68, 'royalty_amount' => 3200.00, 'status' => 'Paid'],
                ['week_number' => 3, 'period_label' => 'May 15 – May 21', 'books_sold' => 61, 'royalty_amount' => 2950.00, 'status' => 'Paid'],
                ['week_number' => 4, 'period_label' => 'May 22 – May 28', 'books_sold' => 67, 'royalty_amount' => 3550.00, 'status' => 'Processing'],
                ['week_number' => 5, 'period_label' => 'May 29 – May 31', 'books_sold' => 0, 'royalty_amount' => 0.00, 'status' => 'Upcoming'],
            ];

            foreach ($defaultWeeks as $w) {
                UserWeeklyRoyalty::firstOrCreate(
                    [
                        'user_id' => $u->id,
                        'year' => 2025,
                        'month' => 5,
                        'week_number' => $w['week_number'],
                    ],
                    [
                        'period_label' => $w['period_label'],
                        'books_sold' => $w['books_sold'],
                        'royalty_amount' => $w['royalty_amount'],
                        'status' => $w['status'],
                    ]
                );
            }
        }
    }
}
