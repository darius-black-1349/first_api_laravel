<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';

    protected $fillable = [

        'title', 'body', 'videoUrl', 'number'

    ];
}
