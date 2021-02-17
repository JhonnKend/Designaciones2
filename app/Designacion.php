<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designacion extends Model
{
    protected static function lista_sorteada($tipo, $gestion, $periodo){
        return \DB::table('quotas')
            ->join('student','student.id','=','quotas.id_student')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('quotas.tipe_internship','=',$tipo)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->get([
                'quotas.id',
                'student.id AS id_estudiante','student.name','student.ap_pat','student.ap_mat','student.ci',
                'estable_saluds.name_estable_salud',
            ]);
    }
    protected static function cupo_suerte($tipo, $gestion, $periodo){
        return \DB::table('quotas')
            ->where('quotas.tipe_internship','=',$tipo)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.status_designation','=',0)
            ->inRandomOrder()
            ->take(1)->get();
    }
    protected static function cnatidad_cupos($id_es, $per, $ges){
        return \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_es)
            ->where('quotas.periodo','=',$per)
            ->where('quotas.gestion','=',$ges)
            ->where('quotas.confirmado','<>',"si")
            ->get();    
    }
    protected static function ver_periodos_gestion($id){
        return \DB::table('enable_periods')
            ->join('periods','periods.id','=','enable_periods.id_period')
            ->join('gestion','gestion.id','=','enable_periods.id_gestion')
            ->where('id_gestion','=',$id)
            ->get([
                'periods.period','periods.id as id_periodo',
                'enable_periods.inicio_rote','enable_periods.fin_rote','enable_periods.date_start','enable_periods.date_end','enable_periods.id as id_e_p',
                'gestion.id as id_gestion','gestion.gestion',
            ]);
    }    
    protected static function list_students($t, $g, $p){
        $sql = 'SELECT s.name,s.ap_pat,s.ap_mat,s.id,s.ci,q.id as id_d,q.confirmado,es.name_estable_salud FROM enable_periods ep 
                INNER JOIN student s
                    ON ep.id = s.id_date_enabled
                INNER JOIN career c
                    ON c.id = s.carrer_id
                LEFT JOIN quotas q
                    ON q.id_student = s.id
                LEFT JOIN estable_saluds es
		            ON es.id = q.id_stable_salud
            WHERE ep.id_gestion = ? and ep.id_period = ? and c.type_internation = ?';
        return \DB::select($sql,array($g,$p,$t));
        return \DB::table('enable_periods')
            ->join('student','student.id_date_enabled','=','enable_periods.id')
            ->join('career','career.id','=','student.carrer_id')
            ->leftjoin('quotas','quotas.id_student','=','student.id')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('enable_periods.id_gestion','=',$g)
            ->where('enable_periods.id_period','=',$p)
            ->where('career.type_internation','=',2)
            ->where('student.type','=',1)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.id','student.ci',
                'quotas.id AS id_d','quotas.confirmado',
                'estable_saluds.name_estable_salud'
            ]);
        return \DB::table('student')
            ->join('enable_periods','student.id_date_enabled','=','enable_periods.id')
            ->join('career','career.id','=','student.carrer_id')
            ->where('enable_periods.id_gestion','=',$g)
            ->where('enable_periods.id_period','=',$p)
            ->where('career.type_internation','=',$t)
            ->where('student.type','=',1)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.id','student.ci',
                //'quotas.id AS id_d',
            ]);
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('enable_periods','student.id_date_enabled','=','enable_periods.id')
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('enable_periods.id_gestion','=',$g)
            ->where('enable_periods.id_period','=',$p)
            ->where('career.type_internation','=',$t)
            ->where('quotas.id_student','=',NULL)
            ->where('student.type','=',1)
            ->get();
        /*
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('enable_periods','student.id_date_enabled','=','enable_periods.id')
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('enable_periods.id_gestion','=',$g)
            ->where('enable_periods.id_period','=',$p)
            ->where('career.type_internation','=',$t)
            ->where('quotas.id_student','=',NULL)
            ->where('student.type','=',1)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.id','student.ci',
                'quotas.id AS id_d',
            ]);
        \DB::table('student')    
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);*/
    }
    protected static function internship_draw_list(){
        return \DB::table('student')    
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_1(){
        return \DB::table('student')            
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',1)
            ->where('quotas.id_student','!=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_insti_1(){
        return \DB::table('student')
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',0)
            ->where('quotas.id_student','!=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function internship_draw_list_insti(){
        return \DB::table('student')            
            ->leftJoin('quotas','quotas.id_student','=','student.id')
            ->where('type','=',0)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'student.id AS id_student','student.name','student.ap_pat','student.ap_mat',
                'quotas.id','quotas.status_designation',
            ]);
    }
    protected static function view_designation_student($id){
        return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('student.id','=',$id)
            ->get([
                'student.id','student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.celular','student.correo','student.sexo','student.direccion',
                'quotas.designation_date','quotas.status_designation','quotas.start_date','quotas.end_date','quotas.periodo',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ])->first();
    }
    protected static function view_designation_student_insti($id){
        return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('student.id','=',$id)
            ->get([
                'student.id','student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.celular','student.correo','student.sexo','student.direccion',
                'quotas.designation_date','quotas.status_designation','quotas.start_date','quotas.end_date','quotas.periodo',
                'internation_types.name_type',
                'estable_saluds.name_estable_salud',
            ])->first();
    }
    //funciones para retornar datos para la vista de los detalles de la designacion
    protected static function view_designation_student_dates($id){
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('municipalities','municipalities.id','=','univeridads.id_municipality')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'student.id',
                'career.name_career',
                'faculties.name_faculty',
                'univeridads.name_university',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department',
            ])
            ->first();
    }
    protected static function view_designation_student_dates_insti($id){
        return \DB::table('student')
            ->join('careers_institute','careers_institute.id','=','student.insti_id')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            ->join('municipalities','municipalities.id','=','institutes.municipality_id')
            ->join('provinces','provinces.id','=','municipalities.id_province')
            ->join('departamentos','departamentos.id','=','provinces.id_department')
            ->where('student.id','=',$id)
            ->get([
                'student.id',
                'careers_institute.name_career',
                'institutes.name_institute',
                'municipalities.name_municipality',
                'provinces.name_province',
                'departamentos.name_department',
            ])
            ->first();
    }
    protected static function view_certification($id){
        $ver = \DB::table('quotas')
                ->where('quotas.id_student','=',$id)
                ->join('student','student.id','=','quotas.id_student')
                ->get([
                    'id_student',
                    'student.insti_id',
                    'student.carrer_id',
                ])->first();
        if($ver->insti_id === 1){
            return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            //->join('quotas AS q','q.id_stable_salud','=','estable_saluds.id')
            ->join('estable_saluds AS q','q.id','=','quotas.id_stable_salud')
            ->join('municipalities','municipalities.id','=','q.id_muni')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('quotas.id_student','=',$id)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.type',
                'quotas.id','quotas.designation_date','quotas.start_date','quotas.end_date',
                'career.name_career',
                'univeridads.name_university',
                'q.name_estable_salud',
                'municipalities.nombre_red',
                'municipalities.name_municipality',
                'internation_types.name_type'

            ])->first();
        }elseif($ver->carrer_id === 1){
            return \DB::table('student')
            ->join('quotas','quotas.id_student','=','student.id')
            ->join('careers_institute','careers_institute.id','=','student.insti_id')
            ->join('institutes','institutes.id','=','careers_institute.institute_id')
            //->join('quotas AS q','q.id_stable_salud','=','estable_saluds.id')
            ->join('estable_saluds AS q','q.id','=','quotas.id_stable_salud')
            ->join('municipalities','municipalities.id','=','q.id_muni')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('quotas.id_student','=',$id)
            ->get([
                'student.name','student.ap_pat','student.ap_mat','student.ci','student.exp','student.type',
                'quotas.id','quotas.designation_date','quotas.start_date','quotas.end_date',
                'careers_institute.name_career',
                'institutes.name_institute',
                'q.name_estable_salud',
                'municipalities.name_municipality',
                'municipalities.nombre_red',
                'internation_types.name_type'

            ])->first();
        }        
    }
    //function para mandar datos del estuduiante para su designacion de cupos
    protected static function student_view($id){
        return $ver = \DB::table('student')
                ->where('student.id','=',$id)
                ->get()->first();
        
    }
    protected static function student_view_insti($id){
        return $ver = \DB::table('student')
                ->where('student.id','=',$id)
                ->get()->first();
        
    }
    protected static function student_view_quotas(){
        return \DB::table('quotas')
            ->join('internation_types','internation_types.id','=','quotas.tipe_internship')
            ->where('status_designation','=',0)
            ->groupBy('quotas.tipe_internship','internation_types.name_type')
            ->get([
                'internation_types.name_type',
                'quotas.tipe_internship'
            ]);
    }
    protected static function quota_select_one($id,$id_periodo){
        return \DB::table('quotas')
            ->where('status_designation','=',0)
            ->where('id_student','=',NULL)
            ->where('periodo','=',$id_periodo)
            ->where('quotas.tipe_internship','=',$id)
            ->inRandomOrder()
            ->first();
    }
    protected static function quota_select_one_insti($id,$id_periodo){
        return \DB::table('quotas')
            ->where('status_designation','=',0)
            ->where('id_student','=',NULL)
            ->where('periodo','=',$id_periodo)
            ->where('quotas.tipe_internship','=',$id)
            ->inRandomOrder()
            ->first();
    }
    protected static function view_designations(){
        return \DB::table('quotas')
            ->join('student','student.id','=','quotas.id_student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('quotas.status_designation','=',1)            
            ->where('quotas.id_student','!=', NULL)  
            ->where('student.type','=', 1)    
            ->get([
                'quotas.start_date','quotas.end_date','quotas.periodo',
                'student.ci','student.name','student.ap_pat','student.ap_mat','student.exp','student.birth_date','student.correo','student.sexo','student.caso_esp',
                'career.name_career',
                'univeridads.name_university',
                'estable_saluds.name_estable_salud',
            ]);
    }
    protected static function student_view_c_f_u($id){
        return \DB::table('student')
            ->join('career','career.id','=','student.carrer_id')
            ->join('faculties','faculties.id','=','career.faculty_id')
            ->join('univeridads','univeridads.id','=','faculties.id_university')
            ->where('student.id','=', $id)  
            ->get();
    }
    protected static function ver_estado_cupos($id_centro_salud,$gestion,$periodo,$m){
        $estado = \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_centro_salud)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$m)
            ->where('quotas.status_designation','=',0)
            ->get(['quotas.status_designation']);
        if( isset($estado)){
            $e = 0;
        }else{
            $e = $estado[0]->status_designation;
        }
        if($e == 0){
            return true;
        }else{
            return false;
        }

    }
    protected static function cant_cupos_registrados($id_centro_salud,$gestion,$periodo,$m){
        $cantidad = \DB::table('quotas')
            ->where('quotas.id_stable_salud','=',$id_centro_salud)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$m)
            ->get(['quotas.status_designation']);
        return $c = count($cantidad);
    }
    protected static function cantidad_cupos($t,$gestion,$periodo){
        $cantidad = \DB::table('quotas')
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$t)
            ->where('quotas.status_designation','=',0)
            ->get(['quotas.status_designation']);
        return $c = count($cantidad);
    }
    protected static function borrar_cupos_cero($id_centro_salud,$gestion,$periodo,$m){
        return \DB::table('quotas')            
            ->where('quotas.id_stable_salud','=',$id_centro_salud)
            ->where('quotas.gestion','=',$gestion)
            ->where('quotas.periodo','=',$periodo)
            ->where('quotas.tipe_internship','=',$m)
            ->delete();
        }
    protected static function lista_estudiantes_designacion($t,$g,$p){
        return \DB::table('quotas')
            ->join('student','student.id','=','quotas.id_student')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->where('quotas.gestion','=',$g)
            ->where('quotas.periodo','=',$p)
            ->where('quotas.tipe_internship','=',$t)
            ->where('quotas.status_designation','=',1)
            ->where('quotas.confirmado','=','si')            
            ->get([
                'quotas.id',
                'student.name','student.ap_pat','student.ap_mat','student.ci','student.id AS id_estudiante',
                'estable_saluds.name_estable_salud'
            ]);
    }
    protected static function cupos_disponibles($t,$g,$p){
        return \DB::table('quotas')
            ->join('estable_saluds','estable_saluds.id','=','quotas.id_stable_salud')
            ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
            ->where('quotas.gestion','=',$g)
            ->where('quotas.periodo','=',$p)
            ->where('quotas.tipe_internship','=',$t)
            ->where('quotas.status_designation','=',0)
            ->where('quotas.id_student','=',NULL)
            ->get([
                'quotas.gestion','quotas.periodo','quotas.tipe_internship','quotas.status_designation','quotas.id_student','quotas.id',
                'estable_saluds.name_estable_salud',
                'municipalities.name_municipality',

            ]);
    }
    protected static function buscar_cupos($id){
        return \DB::table('quotas')
            ->where('quotas.id','=',$id)
            ->get();
    }
}
