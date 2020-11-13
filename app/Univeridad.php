<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Univeridad extends Model
{
	protected  $table = 'univeridads';
    protected $fillable =
	[
        'name_university','depart_id',
    ];
    protected static function view_university(){
        return \DB::table('univeridads')

            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')                   
            ->get([
                'univeridads.id',
                'univeridads.name_university AS n_universidad',
                'univeridads.created_at',
                'univeridads.updated_at',
                'municipalities.name_municipality',
            ]);
    }
    protected static function show_university($id){
        return \DB::table('univeridads')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality') 
            ->where('univeridads.id','=',$id)                   
            ->get([
                'univeridads.id',
                'univeridads.name_university AS n_universidad',
                'univeridads.created_at',
                'univeridads.updated_at',
                'municipalities.name_municipality',
            ]);
    }
    protected static function find_edit_university($id){
        return \DB::table('univeridads')
        ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('univeridads.id','=',$id)
        ->get([
            'univeridads.id',
            'univeridads.name_university',
            'univeridads.id_municipality',
            'municipalities.id_province',
            'provinces.id_department',
        ]);
    }
    protected static function load_universities($id){
        return \DB::table('univeridads')
            ->where('univeridads.id_municipality', '=', $id)
            ->get();
    }
    //Devolver datos del la universidad para su perfil
    protected static function get_dates_perfil($id){
        return \DB::table('univeridads')
        ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('univeridads.id','=',$id)
        ->get([
            'univeridads.id',
            'univeridads.name_university',
            'univeridads.id_municipality',
            'municipalities.name_municipality',
            'municipalities.id as id_mun',
            'provinces.name_province',
            'provinces.id as id_prov',
            'departamentos.name_department',
            'departamentos.id as id_depart',
        ])->first();
    }
}
