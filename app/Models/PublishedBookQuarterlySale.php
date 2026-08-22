<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishedBookQuarterlySale extends Model
{
    use HasFactory;

    protected $table = 'published_book_quarterly_sales';

    protected $fillable = [
        'published_book_id',
        'year',
        'quarter',
        'books_sold',
        'royalty_amount',
    ];

    protected $casts = [
        'year' => 'integer',
        'quarter' => 'integer',
        'books_sold' => 'integer',
        'royalty_amount' => 'float',
    ];

    public function publishedBook()
    {
        return $this->belongsTo(PublishedBook::class);
    }
}
