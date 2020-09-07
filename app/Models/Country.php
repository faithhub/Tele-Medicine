<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'countries';
    protected $fillable = [
        'name', 'code', 'dial_code', 'currency_name', 'currency_symbol', 'currency_code'
    ];

    public function doctor()
    {
        return $this->hasOne(Country::class, 'country_id');
    }
}
