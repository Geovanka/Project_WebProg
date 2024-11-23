<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = [
        'sponsor_id',
        'user_id',
        'event_id',
        'status'
    ];

}
