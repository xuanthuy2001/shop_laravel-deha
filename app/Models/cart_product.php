<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_size',
        'product_quantity',
        'product_price',
    ];

    public function getBy($cartId, $productId, $productSize)
    {
        return cart_product::whereCartId($cartId)->whereProductId($productId)->whereProductSize($productSize)->first();
    }



    public function product()
    {
        return $this -> belongsTo(Product::class);
    }
    public function cart()
    {
        return $this   -> belongsTo(Cart::class);
    }
}