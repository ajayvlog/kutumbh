<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediapost extends Model
{
    protected $fillable = [
        'user_id',
        'title','description',
        'location', 'date','video_url', 'file_path'
    ];

    
}
