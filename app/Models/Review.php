<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'rating',
        'comment',
        'avatar_color',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
