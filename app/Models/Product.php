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
    
    public function getBy($dataSearch, $categoryId)
    {
        return $this->whereHas('categories', fn($q) => $q->where('category_id', $categoryId))->paginate(10);
    }

    public function getImagePathAttribute()
    {
        return  asset($this -> images-> count() >0 ? 'upload/'.$this -> images ->first()-> url : 'upload/default.jpg');
    }
    public function getSalePriceAttribute()
    {
        return  $this -> attributes['sale'] ? $this -> attributes['price'] - ($this -> attributes['sale']*0.01 * $this -> attributes['price']) : 0 ;
    }
}
