<?php

namespace App;
use App\State;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city_name',
        'state_id'
    ];

    public function states() {
        return $this->belongsTo(State::class, 'state_id');
    }
}
