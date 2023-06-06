<?php

namespace App;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state_name',
        'country_id'
    ];

    public function countries() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
