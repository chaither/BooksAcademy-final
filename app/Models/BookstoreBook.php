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
        'description',
        'image',
        'back_image',
        'spine_image',
    ];
}
