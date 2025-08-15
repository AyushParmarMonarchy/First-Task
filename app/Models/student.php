<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'photo',
        'name',
        'gender',
        'std',
        'class',
        'activity',
        'mobile',
        'email_id',
        'dob',
    ];
}
