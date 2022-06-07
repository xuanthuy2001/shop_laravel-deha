<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{
    use HasFactory;
    protected $factories = [
        'product_size',
        'product_color',
        'product_quantity',
        'product_price',
        'user_id',
        'product_id',
    ];
}