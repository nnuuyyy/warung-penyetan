<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer_name',
        'phone_number',
        'order_type',
        'table_or_address',
        'notes',
        'total_price',
        'status',
        'items_json',
    ];

    protected $casts = [
        'items_json' => 'array',
        'total_price' => 'integer',
    ];
}
