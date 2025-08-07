<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'status',
        'address',
        'pw_protected',
        'active_square',
        'apple_pay',
        'apple_login',
        'google_login_ios',
        'google_login_android',
    ];
}
