<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{



	protected  $table = 'student';
    protected  $fillable =
    [
    	'name',
    	'ap_pat',
        'ap_mat',
        'ci',
        'exp',
        'birth_date',
        'celular',
        'correo',
        'sexo',
        'insti_id',
		'carrer_id',
        'caso_esp',

    ];
    protected function view_test(){
        return \DB::table('student')   
                    ->get();
    }
    protected static function show_student($id){
        $test = \DB::table('student')->where('student.id', '=', $id)->get(['insti_id','carrer_id','type'])->first();  
        if($test->type === 1){
            return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'student.carrer_id',
                'student.insti_id',
                'student.id',
                'student.name',
                'student.ap_pat',
                'student.ap_mat',
                'student.ci',
                'student.exp',
                'student.birth_date',
                'student.celular',
                'student.correo',
                'student.sexo',
                'career.name_career',
                'faculties.name_faculty',
                'univeridads.name_university',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department AS name_depart',
            ])->first();
        }else{
            if($test->type === 0){
            return \DB::table('student')
                ->join('careers_institute','careers_institute.id','=','student.insti_id')
                ->join('institutes','institutes.id','=','careers_institute.institute_id')
                ->join('municipalities','municipalities.id','=','institutes.municipality_id')
                ->join('provinces','provinces.id','=','municipalities.id_province')
                ->join('departamentos','departamentos.id','=','provinces.id_department')
                ->where('student.id','=',$id)
                ->get([
                    'student.carrer_id',
                    'student.insti_id',
                    'student.id',
                    'student.name',
                    'student.ap_pat',
                    'student.ap_mat',
                    'student.ci',
                    'student.exp',
                    'student.birth_date',
                    'student.celular',
                    'student.correo',
                    'student.sexo',
                    'careers_institute.name_career',
                    'institutes.name_institute',
                    'municipalities.name_municipality',
                    'provinces.name_province',
                    'departamentos.name_department AS name_depart',
                ])->first();
            }
        }
    }
    protected static function edit_student($id){
        return \DB::table('student')   
        ->where('student.id','=',$id)
        ->get()->first();
    }
    protected static function edit_student_inst($id){
        return \DB::table('student')
            ->join('careers_institute','careers_institute.id','=','student.insti_id')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'careers_institute.id AS id_career',
                'institutes.id AS id_institute',
                'municipalities.id AS id_municipality',
                'provinces.id AS id_province',
                'departamentos.id AS id_depart',
            ])->first();
    }
    protected static function edit_student_uni($id){
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'career.id AS id_career',
                'faculties.id AS id_faculty',
                'univeridads.id AS id_universidad',
                'municipalities.id AS id_municipality',
                'provinces.id AS id_province',
                'departamentos.id AS id_depart',
            ])->first();
    }
    protected static function find_province($id){return \DB::table('provinces')->where('provinces.id_department','=',$id)->get();}
    protected static function find_municipalities($id){return \DB::table('municipalities')->where('municipalities.id_province','=',$id)->get();}
    protected static function find_institutes($id){return \DB::table('institutes')->where('institutes.municipality_id','=',$id)->get();}
    protected static function find_careers_insitutes($id){return \DB::table('careers_institute')->where('careers_institute.institute_id','=',$id)->get();}
    protected static function find_universities($id){return \DB::table('univeridads')->where('univeridads.id_municipality','=',$id)->get();}
    protected static function find_faculties($id){return \DB::table('faculties')->where('faculties.id_university','=',$id)->get();}
    protected static function find_faculties_careers($id){return \DB::table('career')->where('career.faculty_id','=',$id)->get();}
    protected static function studiantes($id,$g,$p){
        return \DB::table('student')
        ->join('enable_periods','enable_periods.id','=','student.id_date_enabled')
        ->join('gestion','gestion.id','=','enable_periods.id_gestion')
        ->join('periods','periods.id','=','enable_periods.id_period')
        ->where('student.carrer_id','=',$id)
        ->where('student.insti_id','=',1)
        ->where('enable_periods.id_gestion','=',$g)
        ->where('enable_periods.id_period','=',$p)
        ->get([
            'student.id',
            'student.name',
            'student.ap_pat',
            'student.ap_mat',
            'student.created_at',
        ]);
    }
}
