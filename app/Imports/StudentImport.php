<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    protected  $p;
    protected  $c;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */ 
    public function __construct($p,$c)
    {
        $this->p = $p;
        $this->c = $c;
    }       
    public function model(array $row)
    {
        $pe = $this->p;
        $ce = $this->c;
        return new Student([
            'name' => $row[0],
            'ap_pat' => $row[1],
            'ap_mat' => $row[2],
            'ci' => $row[3],
            'exp' => $row[4],  
            'birth_date' => $row[5],
            'celular' => $row[6],
            'correo' => $row[7],
            'direccion' => $row[8],
            'sexo' => $row[9], 
            'type' => 1,   
            'insti_id' => 1,
            'level_ac' => 4,   
            'caso_esp' => 1,            
            'carrer_id' => $ce,            
            'id_date_enabled' => $pe,
            'user_create' => Auth::user()->id,
        ]);
    }
}
