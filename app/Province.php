<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected  $fillable =
    [
    	'cod_prov',
    	'name_province',
        'cod_depa',
        'id_department',
        'user_create',

    ];
    protected static function view_provinces(){
        return $view_provinces = \DB::table('provinces')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->get([
            'provinces.id',
            'provinces.name_province',
            'provinces.cod_prov',
            'provinces.created_at',
            'provinces.updated_at',
            'departamentos.name_department',
        ]);
    }
    protected static function show_province($id){
        return $show_provinces = \DB::table('provinces')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('provinces.id','=',$id)
        ->get([
            'provinces.id',
            'provinces.name_province',
            'provinces.cod_prov',
            'provinces.created_at',
            'provinces.updated_at',
            'departamentos.name_department',
        ]);
    }
    protected static function edit_province($id){
        return $edit_province = \DB::table('provinces')
            ->where('provinces.id','=',$id)
            ->get();
    }
}
