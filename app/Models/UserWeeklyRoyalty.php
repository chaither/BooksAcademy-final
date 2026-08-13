<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeeklyRoyalty extends Model
{
    use HasFactory;

    protected $table = 'user_weekly_royalties';

    protected $fillable = [
        'user_id',
        'year',
        'month',
        'week_number',
        'period_label',
        'books_sold',
        'royalty_amount',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
        'week_number' => 'integer',
        'books_sold' => 'integer',
        'royalty_amount' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
