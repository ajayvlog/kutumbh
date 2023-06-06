<?php

namespace App;
use App\Religion;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $fillable = [
        'cast_name',
        'relgn_id'
    ];

    public function religions() {
        return $this->belongsTo(Religion::class, 'relgn_id');
    }
}
