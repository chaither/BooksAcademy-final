<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserQuarterlyRoyalty;
use App\Models\PublishedBook;
use App\Models\PublishedBookQuarterlySale;
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

        // Seed default 2025 quarterly royalties and book sales for regular authors
        $regularUsers = User::where('is_admin', false)->get();
        foreach ($regularUsers as $u) {
            // Seed published books
            $booksData = [
                ['title' => 'Whispers of Dawn', 'cover_image_path' => 'published-books/mock_whispers.jpg'],
                ['title' => 'Beyond the Horizon', 'cover_image_path' => 'published-books/mock_beyond.jpg'],
                ['title' => 'Echoes of Yesterday', 'cover_image_path' => 'published-books/mock_echoes.jpg'],
                ['title' => 'Shadows and Light', 'cover_image_path' => 'published-books/mock_shadows.jpg'],
                ['title' => 'The Silent Promise', 'cover_image_path' => 'published-books/mock_silent.jpg'],
                ['title' => 'Midnight Tales', 'cover_image_path' => 'published-books/mock_midnight.jpg'],
            ];

            $books = [];
            foreach ($booksData as $bData) {
                $books[] = PublishedBook::firstOrCreate(
                    [
                        'user_id' => $u->id,
                        'title' => $bData['title'],
                    ],
                    [
                        'cover_image_path' => $bData['cover_image_path'],
                    ]
                );
            }

            // Mock quarterly data details
            $quarterSales = [
                1 => [ // Q1
                    'Whispers of Dawn' => ['sold' => 65, 'royalty' => 650.00],
                    'Beyond the Horizon' => ['sold' => 55, 'royalty' => 550.00],
                    'Echoes of Yesterday' => ['sold' => 45, 'royalty' => 450.00],
                    'Shadows and Light' => ['sold' => 35, 'royalty' => 350.00],
                    'The Silent Promise' => ['sold' => 30, 'royalty' => 300.00],
                    'Midnight Tales' => ['sold' => 18, 'royalty' => 150.00],
                    'status' => 'Paid'
                ],
                2 => [ // Q2
                    'Whispers of Dawn' => ['sold' => 85, 'royalty' => 850.00],
                    'Beyond the Horizon' => ['sold' => 75, 'royalty' => 750.00],
                    'Echoes of Yesterday' => ['sold' => 55, 'royalty' => 550.00],
                    'Shadows and Light' => ['sold' => 50, 'royalty' => 500.00],
                    'The Silent Promise' => ['sold' => 35, 'royalty' => 350.00],
                    'Midnight Tales' => ['sold' => 26, 'royalty' => 260.00],
                    'status' => 'Paid'
                ],
                3 => [ // Q3
                    'Whispers of Dawn' => ['sold' => 90, 'royalty' => 900.00],
                    'Beyond the Horizon' => ['sold' => 80, 'royalty' => 800.00],
                    'Echoes of Yesterday' => ['sold' => 60, 'royalty' => 600.00],
                    'Shadows and Light' => ['sold' => 55, 'royalty' => 550.00],
                    'The Silent Promise' => ['sold' => 45, 'royalty' => 450.00],
                    'Midnight Tales' => ['sold' => 29, 'royalty' => 290.00],
                    'status' => 'Paid'
                ],
                4 => [ // Q4
                    'Whispers of Dawn' => ['sold' => 80, 'royalty' => 800.00],
                    'Beyond the Horizon' => ['sold' => 70, 'royalty' => 700.00],
                    'Echoes of Yesterday' => ['sold' => 50, 'royalty' => 500.00],
                    'Shadows and Light' => ['sold' => 50, 'royalty' => 500.00],
                    'The Silent Promise' => ['sold' => 40, 'royalty' => 400.00],
                    'Midnight Tales' => ['sold' => 25, 'royalty' => 250.00],
                    'status' => 'Upcoming'
                ],
            ];

            foreach ($quarterSales as $q => $data) {
                $status = $data['status'];
                $totalSold = 0;
                $totalRoyalty = 0.00;

                foreach ($books as $book) {
                    $bookData = $data[$book->title];
                    $totalSold += $bookData['sold'];
                    $totalRoyalty += $bookData['royalty'];

                    PublishedBookQuarterlySale::firstOrCreate(
                        [
                            'published_book_id' => $book->id,
                            'year' => 2025,
                            'quarter' => $q,
                        ],
                        [
                            'books_sold' => $bookData['sold'],
                            'royalty_amount' => $bookData['royalty'],
                        ]
                    );
                }

                UserQuarterlyRoyalty::firstOrCreate(
                    [
                        'user_id' => $u->id,
                        'year' => 2025,
                        'quarter' => $q,
                    ],
                    [
                        'books_sold' => $totalSold,
                        'royalty_amount' => $totalRoyalty,
                        'status' => $status,
                    ]
                );
            }
        }
    }
}
