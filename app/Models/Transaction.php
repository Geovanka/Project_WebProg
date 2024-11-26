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
        'status',
        'file_path'
    ];

    public function sponsors()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
