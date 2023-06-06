<?php

namespace App;
// use App\City;
// use App\State;
use App\Tehsil;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'village_name',
        'city_id',
        'state_id',
        'tehsil_id'
    ];

    // public function state() {
    //     return $this->belongsTo(State::class, 'state_id');
    // }

    // public function city() {
    //     return $this->belongsTo(City::class, 'city_id');
    // }

    public function tehsil() {
        return $this->belongsTo(Tehsil::class, 'tehsil_id');
    }
}
