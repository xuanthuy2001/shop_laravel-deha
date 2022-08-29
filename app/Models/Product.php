<?php

namespace App\Models;

use App\Models\Product_detail;
use App\Traits\HandleImageTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , HandleImageTrait;
    protected $fillable = [
        'name',
        'description',
        'sale',
        'price',
    ];

    public function details()
    {
        return $this->hasMany(Product_detail::class);
    }


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function assignCategory($categoryIds)
    {
        return $this->categories()->sync($categoryIds);
    }
   
}