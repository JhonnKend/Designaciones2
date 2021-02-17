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
    protected static function buscar_periodo($id){
        return \DB::table('enable_periods')
            ->where('enable_periods.id','=',$id)
            ->get();
    }
}
