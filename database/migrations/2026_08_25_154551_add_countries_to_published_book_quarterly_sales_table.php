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
        Schema::table('published_book_quarterly_sales', function (Blueprint $table) {
            $table->json('countries')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('published_book_quarterly_sales', function (Blueprint $table) {
            $table->dropColumn('countries');
        });
    }
};
