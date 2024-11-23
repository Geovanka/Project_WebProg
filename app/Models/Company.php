<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'company';
    protected $fillable = [
        'name',
        'desc',
        'status'
    ];
    
    public $timestamps = false;
}
