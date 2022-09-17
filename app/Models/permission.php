<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class permission extends ModelsPermission
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
        'group',
    ];
}
