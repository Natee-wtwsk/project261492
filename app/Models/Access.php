<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Access extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'secret',
    ];

    protected $hidden = [
        'secret',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
