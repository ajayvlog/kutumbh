<?php

namespace App;
use App\City;
use App\State;

use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    protected $fillable = [
        'tehsil_name',
        'city_id',
        'state_id'
    ];

    public function state() {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }
}
