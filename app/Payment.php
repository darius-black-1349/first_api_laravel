<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [

        'resnumber', 'course_id', 'price', 'payment'

    ];
}
