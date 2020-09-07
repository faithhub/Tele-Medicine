<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'user_id', 'status', 'transaction_id', 'tx_ref',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
