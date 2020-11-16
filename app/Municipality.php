<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';
    protected  $fillable =
    [
    	'cod_muni',
    	'name_municipality',
        'cod_prov',
        'cod_red',
        'id_province',
        'user_create',

    ];
    protected static function view_municipalities(){
        return $view_municipalities = \DB::table('municipalities')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->get([
            'municipalities.id',
            'municipalities.cod_muni',
            'municipalities.name_municipality',
            'municipalities.created_at',
            'provinces.name_province',
        ]);
    }
    protected static function show_municipality($id){
        return $show_municipality = \DB::table('municipalities')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('municipalities.id','=',$id)
        ->get([
            'municipalities.cod_muni',
            'municipalities.name_municipality',
            'municipalities.cod_red',
            'municipalities.created_at',
            'municipalities.updated_at',
            'provinces.name_province',
            'departamentos.name_department',
        ]);
    }
    protected static function find_muni($id){
        return \DB::table('municipalities')        
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->join('cod_reds','cod_reds.id','=','municipalities.cod_red')
        ->where('municipalities.id','=',$id)
        ->get([
            'municipalities.id',
            'municipalities.cod_muni',
            'municipalities.cod_red',
            'municipalities.name_municipality',
            'provinces.id as id_provincia',
            'departamentos.id as id_departamento',    
        ]);        
    }
}
