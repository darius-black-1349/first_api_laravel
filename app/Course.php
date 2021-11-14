<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Episode;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'title', 'body', 'image', 'price'
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
