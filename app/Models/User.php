<?php

namespace App\Models;

use App\Traits\HandleImageTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use  HasFactory, Notifiable;
    use  HandleImageTrait , HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}