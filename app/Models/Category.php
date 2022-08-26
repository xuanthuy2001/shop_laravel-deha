<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function parent()
    {
        return $this -> belongsTo(Category::class,'parent_id');
    }
    public function childrent()
    {
        return $this -> hasMany(Category::class,'parent_id');
    }
    public function getParentNameAttribute()
    {
        return optional($this -> parent) -> name;
    }
    public function getParents()
    {
        return Category::wherenull('parent_id') -> get(['id','name']);
    }
}