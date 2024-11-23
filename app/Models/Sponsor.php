<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $table = 'sponsors';
    protected $fillable = [
        'name',
        'email',
        'password',
        'description'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
