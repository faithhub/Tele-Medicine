<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'doctor_id', 'patient_id', 'speciality_id', 'book_day', 'book_time'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Models\Speciality', 'speciality_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\User', 'patient_id');
    }
}
