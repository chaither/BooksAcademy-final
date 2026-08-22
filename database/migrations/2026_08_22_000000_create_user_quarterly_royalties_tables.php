<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_quarterly_royalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('year');
            $table->integer('quarter'); // 1, 2, 3, 4
            $table->integer('books_sold')->default(0);
            $table->decimal('royalty_amount', 10, 2)->default(0.00);
            $table->string('status')->default('Upcoming'); // Paid, Processing, Upcoming
            $table->timestamps();

            $table->unique(['user_id', 'year', 'quarter']);
        });

        Schema::create('published_book_quarterly_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('published_book_id')->constrained('published_books')->onDelete('cascade');
            $table->integer('year');
            $table->integer('quarter'); // 1, 2, 3, 4
            $table->integer('books_sold')->default(0);
            $table->decimal('royalty_amount', 10, 2)->default(0.00);
            $table->timestamps();

            $table->unique(['published_book_id', 'year', 'quarter'], 'book_qtr_sales_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('published_book_quarterly_sales');
        Schema::dropIfExists('user_quarterly_royalties');
    }
};
