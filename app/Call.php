<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'calls';
    protected $fillable = [
        'caller_id', 'receiver_id', 'session_id', 'token',
    ];

    public function caller()
    {
        return $this->belongsTo('App\User', 'caller_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
