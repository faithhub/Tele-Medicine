<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $fillable = [
       'doctor_id', 'user_id', 'medicine_type', 'medicine_name', 'mg_ml', 'dose', 'day', 'medicine_comment', 'overall_comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }
}
