<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstableSalud extends Model
{
    protected $table = 'estable_saluds';
    protected  $fillable =
    [
    	'cod_estable_salud',
    	'name_estable_salud',
        'type',
        'id_muni',
        'user_create',

    ];
    protected static function list_medical_centers($gestion, $periodo){
        //return $gestion;
        $g = intval($gestion);
        $p = intval($periodo);
        $q = "SELECT es.id, es.name_estable_salud, es.cod_estable_salud, m.name_municipality,
                (SELECT IFNULL((SELECT count(q.id) FROM quotas q INNER JOIN gestion g ON q.gestion = g.id INNER JOIN periods p ON q.periodo = p.id WHERE tipe_internship = 1 AND g.id = :g AND p.id = :p AND id_stable_salud = es.id GROUP BY id_stable_salud), 0)) as m,
                (SELECT IFNULL((SELECT count(q.id) FROM quotas q INNER JOIN gestion g ON q.gestion = g.id INNER JOIN periods p ON q.periodo = p.id WHERE tipe_internship = 2 AND g.id = :g1 AND p.id = :p1 AND id_stable_salud = es.id GROUP BY id_stable_salud), 0)) as e,
                (SELECT IFNULL((SELECT count(q.id) FROM quotas q INNER JOIN gestion g ON q.gestion = g.id INNER JOIN periods p ON q.periodo = p.id WHERE tipe_internship = 3 AND g.id = :g2 AND p.id = :p2 AND id_stable_salud = es.id GROUP BY id_stable_salud), 0)) as d 
            FROM estable_saluds es 
                INNER JOIN municipalities m
                    ON m.id = es.id_muni
            ORDER BY es.id";
        //$lista=\DB::select(\DB::raw($q)); 
        $lista=\DB::select(\DB::raw($q),array('p'=>$p,'g'=>$g,'p1'=>$p,'g1'=>$g,'p2'=>$p,'g2'=>$g)); 
        return $lista;
    }
    protected static function view_medical_center(){
        return $view_medical_center = \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.name_estable_salud',
            'estable_saluds.type',
            'estable_saluds.cod_muni',
            'estable_saluds.id_muni',
            'estable_saluds.created_at',
            'municipalities.name_municipality',
            'estable_saluds.user_create',
        ]);
    }
    protected static function show_medical_center($id){
        return \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('estable_saluds.id','=',$id)
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.name_estable_salud',
            'estable_saluds.type',
            'estable_saluds.created_at',
            'estable_saluds.updated_at',
            'municipalities.name_municipality',
            'provinces.name_province',
            'departamentos.name_department',
        ]);
    }
    protected static function find_edit_medicalCenter($id){
        return $find_edit_medicalCenter = \DB::table('estable_saluds')
        ->join('municipalities','municipalities.id','=','estable_saluds.id_muni')
        ->join('provinces','provinces.id','=','municipalities.id_province')
        ->join('departamentos','departamentos.id','=','provinces.id_department')
        ->where('estable_saluds.id','=',$id)
        ->get([
            'estable_saluds.id',
            'estable_saluds.cod_estable_salud',
            'estable_saluds.subsector',
            'estable_saluds.atention_nivel',
            'estable_saluds.name_estable_salud',
            'estable_saluds.id_muni',
            'municipalities.id_province',
            'provinces.id_department',
        ]);
    }
    protected static function show_medical_center_dates($id){
        return $find_edit_medicalCenter = \DB::table('mc_dmc')
        ->join('date_medical_center','date_medical_center.id','=','mc_dmc.id_date_medical_center')
        ->where('mc_dmc.id_medical_center','=',$id)
        ->get();
    }
}
