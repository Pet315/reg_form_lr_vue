<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'report_subject',
        'country',
        'phone',
        'email',
        'company',
        'position',
        'about_me',
        'photo'
    ];
}
