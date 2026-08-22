<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuarterlyRoyalty extends Model
{
    use HasFactory;

    protected $table = 'user_quarterly_royalties';

    protected $fillable = [
        'user_id',
        'year',
        'quarter',
        'books_sold',
        'royalty_amount',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
        'quarter' => 'integer',
        'books_sold' => 'integer',
        'royalty_amount' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
