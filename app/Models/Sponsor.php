<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sponsor extends Authenticatable
{
    //
    protected $table = 'sponsors';
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
