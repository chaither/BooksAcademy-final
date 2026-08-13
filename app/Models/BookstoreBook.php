<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookstoreBook extends Model
{
    protected $fillable = [
        'title',
        'author',
        'category',
        'price',
        'buy_url',
        'description',
        'image',
        'back_image',
        'spine_image',
    ];
}
