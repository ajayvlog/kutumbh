<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dynastie extends Model
{
    protected $table = 'dynasties';
    
    protected $fillable = [
        'dynasty_name'
    ];
}
