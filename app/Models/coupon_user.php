<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupond_id',
        'user_id',
        'value',
        'order_id'
    ];
}