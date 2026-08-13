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
        Schema::create('user_weekly_royalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('year');
            $table->integer('month');
            $table->integer('week_number');
            $table->string('period_label');
            $table->integer('books_sold')->default(0);
            $table->decimal('royalty_amount', 10, 2)->default(0.00);
            $table->string('status')->default('Upcoming');
            $table->timestamps();

            $table->unique(['user_id', 'year', 'month', 'week_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_weekly_royalties');
    }
};
