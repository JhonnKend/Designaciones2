<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enable_periods extends Model
{
    protected $table = 'enable_periods';
    protected  $fillable =
    [
    	'date_start',
    	'date_end',
        'id_gestion',
        'id_period',
        'user_create',
        'user_edit',
        'status_',

    ];
}
