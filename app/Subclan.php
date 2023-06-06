<?php

namespace App;
use App\Clan;
use Illuminate\Database\Eloquent\Model;

class Subclan extends Model
{
    protected $fillable = [
        'subclan_name',
        'clan_id'
    ];

    public function clans() {
        return $this->belongsTo(Clan::class, 'clan_id');
    }
}
