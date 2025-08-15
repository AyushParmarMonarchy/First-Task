<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Authenticatable
{
    protected $fillable = [
        'first',
        'last',
        'email_id',
        'mobile',
        'gender',
        'dob',
        'password'
    ];

   
}
