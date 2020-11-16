<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    protected $table = 'periods';
    protected  $fillable =
    [
    	'period',
    	'status_period',
        'user_create',

    ];
}
