<?php

use App\Models\User;
use App\Models\PublishedBook;
use App\Models\UserQuarterlyRoyalty;
use App\Models\PublishedBookQuarterlySale;

test('admin can store quarterly royalties and book sales for a user', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['is_admin' => false]);
    $book = PublishedBook::create([
        'user_id' => $user->id,
        'title' => 'Test Novel'
    ]);

    $response = $this
        ->actingAs($admin)
        ->postJson("/admin/users/{$user->id}/quarterly-royalties", [
            'year' => 2025,
            'quarters' => [
                [
                    'quarter' => 1,
                    'status' => 'Paid',
                    'book_sales' => [
                        [
                            'published_book_id' => $book->id,
                            'books_sold' => 10,
                            'royalty_amount' => 100.00
                        ]
                    ]
                ],
                [
                    'quarter' => 2,
                    'status' => 'Upcoming',
                    'book_sales' => []
                ],
                [
                    'quarter' => 3,
                    'status' => 'Upcoming',
                    'book_sales' => []
                ],
                [
                    'quarter' => 4,
                    'status' => 'Upcoming',
                    'book_sales' => []
                ],
            ]
        ]);

    $response->assertOk();
    $response->assertJson(['success' => true]);

    $this->assertDatabaseHas('user_quarterly_royalties', [
        'user_id' => $user->id,
        'year' => 2025,
        'quarter' => 1,
        'books_sold' => 10,
        'royalty_amount' => 100.00,
        'status' => 'Paid'
    ]);

    $this->assertDatabaseHas('published_book_quarterly_sales', [
        'published_book_id' => $book->id,
        'year' => 2025,
        'quarter' => 1,
        'books_sold' => 10,
        'royalty_amount' => 100.00
    ]);
});

test('non-admin cannot store quarterly royalties', function () {
    $user = User::factory()->create(['is_admin' => false]);
    $otherUser = User::factory()->create(['is_admin' => false]);

    $response = $this
        ->actingAs($user)
        ->postJson("/admin/users/{$otherUser->id}/quarterly-royalties", [
            'year' => 2025,
            'quarters' => []
        ]);

    $response->assertForbidden();
});

test('authenticated user or admin can retrieve quarterly royalties', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['is_admin' => false]);
    $otherUser = User::factory()->create(['is_admin' => false]);

    UserQuarterlyRoyalty::create([
        'user_id' => $user->id,
        'year' => 2025,
        'quarter' => 1,
        'books_sold' => 50,
        'royalty_amount' => 500.00,
        'status' => 'Paid'
    ]);

    // Retrieve as user themselves
    $response1 = $this
        ->actingAs($user)
        ->getJson("/admin/users/{$user->id}/quarterly-royalties?year=2025");
    $response1->assertOk();
    $response1->assertJsonPath('records.0.books_sold', 50);

    // Retrieve as admin
    $response2 = $this
        ->actingAs($admin)
        ->getJson("/admin/users/{$user->id}/quarterly-royalties?year=2025");
    $response2->assertOk();

    // Try retrieve as other user (should fail)
    $response3 = $this
        ->actingAs($otherUser)
        ->getJson("/admin/users/{$user->id}/quarterly-royalties?year=2025");
    $response3->assertForbidden();
});
