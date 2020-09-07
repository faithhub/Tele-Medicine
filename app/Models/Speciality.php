<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Speciality extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'specialities';
    protected $fillable = [
        'name', 'status',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'speciality_id');
    }
}
