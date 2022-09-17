<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'name',
        'type',
        'value',
        'expery_date',
    ];
    public function getExperyDateAttribute()
    {
        return Carbon::parse($this->attributes['expery_date'])->format('Y-m-d');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_users');
    }

    public function firstWithExperyDate($name, $userId)
    {
        return $this->whereName($name)->whereDoesntHave('users', fn($q) => $q->where('users.id', $userId))
        ->whereDate('expery_date', '>=', Carbon::now())->first();
    }
}
