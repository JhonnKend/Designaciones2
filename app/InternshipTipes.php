<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipTipes extends Model
{
    protected $table = 'internation_types';
    protected  $fillable =
    [
    	'name_type',
    	'description',
        'user_create',
    ];
    protected static function index_internship_types(){
        return \DB::table('internation_types')
            ->get();
            
    }
    protected static function tipo_internado_view($t){
        return \DB::table('internation_types')
        ->where('internation_types.id', '=', $t)
        ->get();
    }
    protected static function edit_internship_types($id){
        return \DB::table('internation_types')
            ->where('internation_types.id','=',$id)
            ->get()->first();
    }
    protected static function get_type_int(){
        return \DB::table('internation_types')
            ->where('internation_types.level_ac','=',1)
            ->get();
    }
    protected static function get_types_institute(){
        return \DB::table('internation_types')
            ->where('internation_types.level_ac','=',2)
            ->get();
    }
    protected static function view_internships_types(){
        return \DB::table('internation_types')
            
            ->get();
    }
}
