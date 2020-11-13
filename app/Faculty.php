<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';
    protected  $fillable =
    [
    	'name_faculty',
    	'description',
        'id_university',
        'user_create',

    ];
    protected static function view_faculties(){
        return \DB::table('faculties')
        ->join('univeridads','univeridads.id','=','faculties.id_university')
        ->get([
            'faculties.id',
            'faculties.name_faculty',
            'faculties.description',
            'faculties.created_at',
            'univeridads.name_university',
        ]);
    }
    protected static function show_faculty($id){
        return \DB::table('faculties')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->where('faculties.id', '=', $id)
            ->get([
                'faculties.id',
                'faculties.name_faculty',
                'faculties.description',
                'faculties.created_at',
                'faculties.updated_at',
                'univeridads.name_university',
            ]);
    }
    protected static function find_edit_faculty($id){        
        return \DB::table('faculties')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('faculties.id','=',$id)
            ->get([
                'faculties.id AS id_fa',
                'faculties.name_faculty',
                'faculties.description',
                'faculties.id_university',
                'univeridads.id_municipality',
                'municipalities.id_province',
                'provinces.id_department',
                'departamentos.id',
            ]);
    }
    protected static function find_faculties($id){
        return \DB::table('faculties')
            ->where('faculties.id_university','=',$id)
            ->get();
    }
    //PAra devolver las Facultades de una Universidad
    protected static function view_my_faculties($id){
        return \DB::table('faculties')
        ->join('univeridads','univeridads.id','=','faculties.id_university')
        ->where('faculties.id_university','=',$id)
        ->get([
            'faculties.id',
            'faculties.name_faculty',
            'faculties.description',
            'faculties.created_at',
            'univeridads.name_university',
        ]);
    }
}
