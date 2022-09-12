<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
   

    protected $table = 'carts';

    protected $fillable = [
        'user_id'
    ];
    public function products()
    {
        return $this-> hasMany(cart_product::class,'cart_id');
    }
    public function  getBy($userId)
    {
        
        return Cart::whereUserId($userId)->first();
    }
    public function firtOrCreateBy($userId)
    {
        $cart = $this->getBy($userId);
        if($cart===null)
        {
            $cart = Cart::Create(['user_id' => $userId]);
        }
        return $cart;
    }
    public function getProductCountAttribute()
    {
        return auth()->check() ? $this->products->count() : 0;
    }

    public function getTotalPriceAttribute()
    {
        return auth()->check() ? $this->products->reduce(function ($carry, $item) {
            $item->load('product');
            $price = $item->product_quantity * ($item->product->sale ? $item->product->sale_price : $item->product->price);
            return $carry + $price;
        }, 0) : 0;
    }

}