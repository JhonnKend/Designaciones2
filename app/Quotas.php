<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotas extends Model
{
    protected $table = 'quotas';
    protected  $fillable =
    [
    	'id_student',
    	'id_stable_salud',
        'tipe_internship',
        'user_create',
        'user_edit',
        'status_designation',
    ];
    protected static function quotas_index(){
        return \DB::table('quotas')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->join('gestion','gestion.id','=','quotas.gestion')
            ->join('periods','periods.id','=','quotas.periodo')
            ->get([
                'quotas.id',
                'quotas.gestion',
                'quotas.status_designation',
                'quotas.created_at',
                'gestion.gestion',
                'periods.period',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ]);
    }
    protected static function view_quotas(){
        return \DB::table('quotas')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->get([
                'quotas.id',
                'quotas.status_designation',
                'quotas.created_at',
                'quotas.periodo',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ]);
    }
}
