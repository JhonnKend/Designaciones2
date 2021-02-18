<?php

namespace App\Http\Controllers;

use App\Caso;
use App\Departamento;
use App\Student;
use App\Carrer;
use App\CareerInstitute;
use App\Exports\StudentsExport;
use App\Imports\StudentImport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // public function getCarrer()
    // {
    //      if ($request->ajax()) {
    //         $careers = Univeridad::where('depart_id', $request->depart_id)->get();
    //         foreach ($careers as $career) {
    //             $careersArray[$career->id] = $career->nombre;
    //      }
    //     return response()->json($careersArray);
    //     }

    // }

    public function register(){
        $departments = Departamento::all();
        $casos = Caso::all();
        return view('students.create1', compact('departments', 'casos'));
    }
    public function index()
    {
        $students = Student::all();
        return view('students.index' ,  ['students' => $students ]);
    }

    public function create()
    {   
        $hoy = date('Y/m/d');
        $periodo_habilitados = \DB::table('enable_periods')
        ->join('gestion','gestion.id','=','enable_periods.id_gestion')
        ->join('periods','periods.id','=','enable_periods.id_period')
        ->where('enable_periods.date_end','>', $hoy)
        ->where('enable_periods.date_start','<=', $hoy)
        ->get([
            'enable_periods.id','enable_periods.date_start','enable_periods.date_end',
            'gestion.gestion',
            'periods.period',
        ]);
         $departments = Departamento::all();
         $casos = Caso::all();
         return view('students.create', compact('departments', 'casos','periodo_habilitados'));
    }
    public function store_students(Request $request)
    {
        $status = 'success';
        $conent = 'El Estudiante'. $request->name .' fue Registrado Correctamente';
        $request->validate([
            'type_uni_inst' => 'required',
        ],[
            'type_uni_inst.required' => 'Usted debe seleccionar una Institucion Educativa',
        ]);
        if($request->type_uni_inst === 'universidad'){
            $request->validate([
                'a_paterno' => 'required|alpha',
                'a_materno' => 'required|alpha',
                'name_student' => 'required|alpha',
                'addrees' => 'required',
                'birth_date' => 'required',
                'ci' => 'required|unique:student',
                'email' => 'required',
                'phone' => 'numeric',
                'id_department' => 'numeric',
                'id_province' => 'numeric',
                'id_municipality' => 'numeric',
                'id_university' => 'numeric',
                'id_faculty' => 'numeric',
                'id_career' => 'numeric',
                'id_periodo' => 'required',
            ],[
                'ci.unique' => 'El numero de carnet ya esta siendo Utilizado',
                'a_paterno.alpha' => 'El Apellido Paterno debe contener solo Letras',
                'a_paterno.required' => 'El Apellido Paterno es Obligatorio',
                'a_materno.alpha' => 'El Apellido Materno debe contener solo Letras',
                'a_materno.required' => 'El Apellido Materno es Obligatorio',
                'name_student.alpha' => 'El Nombre Estudiante debe contener solo Letras',
                'name_student.required' => 'El Nombre Estudiante es Obligatorio',
                'addrees.required' => 'Debe llenar la direccion del Estudiante',
                'birth_date.required' => 'Debe llenar este Campo',
                'ci.required' => 'El Numero de Carnet es Obligatorio',
                'email.required' => 'El Correo Electronico es Obligatorio',                
                'phone.numeric' => 'El Telefono debe ser Numerico',
                'id_department.numeric' => 'Seleccione un Departamento',  
                'id_province.numeric' => 'Seleccione una Provincia',    
                'id_municipality.numeric' => 'Seleccione un Municipio',
                'id_faculty.numeric' => 'Seleccione una Facultad',
                'id_university.numeric' => 'Seleccione una Universidad',
                'id_career.numeric' => 'Seleccione una Carrera',
                'id_periodo.required' => 'Debe seleccionar un Periodo',
                      
            ]);
                $type_internship = Carrer::find($request->id_career);
                $new_student = new Student();
                $new_student->name = request ('name_student');
                $new_student->ap_pat = request ('a_paterno');
                $new_student->ap_mat = request ('a_materno');
                $new_student->ci = request ('ci');
                $new_student->exp = request ('exp');
                $new_student->birth_date = request ('birth_date');
                $new_student->celular = request ('phone');
                $new_student->id_date_enabled = request ('id_periodo');
                $new_student->correo = request ('email');
                $new_student->direccion = request ('addrees');
                $new_student->sexo = request ('genero');
                $new_student->level_ac = $type_internship->type_internation;
                $new_student->type = true;
                $new_student->insti_id = 1;
                $new_student->carrer_id = request ('id_career');
                $new_student->caso_esp = 1;
                $new_student->user_create = \Auth::user()->id;
                $new_student->save();
        }else{
            $request->validate([
                'a_paterno' => 'required|alpha',
                'a_materno' => 'required|alpha',
                'name_student' => 'required|alpha',
                'addrees' => 'required',
                'birth_date' => 'required',
                'ci' => 'required|unique:student',
                'email' => 'required',
                'exp' => 'required',
                'genero' => 'required',
                'phone' => 'numeric',
                'id_department' => 'numeric',
                'id_province' => 'numeric',
                'id_municipality' => 'numeric',
                'id_institute' => 'numeric',
                'id_career' => 'numeric'    
            ],[
                //validacion para el formulario de institucion educativa
                'ci.unique' => 'El numero de carnet ya esta siendo Utilizado',
                'a_paterno.alpha' => 'El Apellido Paterno debe contener solo Letras',
                'a_paterno.required' => 'El Apellido Paterno es Obligatorio',
                'a_materno.alpha' => 'El Apellido Materno debe contener solo Letras',
                'a_materno.required' => 'El Apellido Materno es Obligatorio',
                'name_student.alpha' => 'El Nombre Estudiante debe contener solo Letras',
                'name_student.required' => 'El Nombre Estudiante es Obligatorio',
                'addrees.required' => 'Debe llenar la direccion del Estudiante',
                'birth_date.required' => 'Debe llenar este Campo',
                'ci.required' => 'El Numero de Carnet es Obligatorio',
                'email.required' => 'El Correo Electronico es Obligatorio',                
                'phone.numeric' => 'El Telefono debe ser Numerico',

                'id_department.numeric' => 'Seleccione un Departamento',  
                'id_province.numeric' => 'Seleccione una Provincia',    
                'id_municipality.numeric' => 'Seleccione un Municipio',
                'id_institute.numeric' => 'Seleccione un Instituto',
                'id_career.numeric' => 'Seleccione una Carrera',
            ]);
                $type_internship = CareerInstitute::find($request->id_career);
                $new_student = new Student();
                $new_student->name = request ('name_student');
                $new_student->ap_pat = request ('a_paterno');
                $new_student->ap_mat = request ('a_materno');
                $new_student->ci = request ('ci');
                $new_student->exp = request ('exp');
                $new_student->birth_date = request ('birth_date');
                $new_student->celular = request ('phone');
                $new_student->correo = request ('email');
                $new_student->sexo = request ('genero');
                $new_student->level_ac = $type_internship->type_internation;
                $new_student->type = false;
                $new_student->direccion = request ('addrees');
                $new_student->insti_id = request ('id_career');
                $new_student->carrer_id = 1;
                $new_student->caso_esp = 1;
                $new_student->user_create = \Auth::user()->id;
                $new_student->save();
        }
		return redirect()->route('index_students')
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]); 
    }
    public function store_students_uni(Request $request)
    {
        $status = 'success';
        $conent = 'El Estudiante'. $request->name .' fue Registrado Correctamente';
        $request->validate([
            'type_uni_inst' => 'required',
        ],[
            'type_uni_inst.required' => 'Usted debe seleccionar una Institucion Educativa',
        ]);
        $request->validate([
            'a_paterno' => 'required|alpha',
            'a_materno' => 'required|alpha',
            'name_student' => 'required|alpha',
            'addrees' => 'required',
            'birth_date' => 'required',
            'ci' => 'required|unique:student',
            'email' => 'required',
            'phone' => 'numeric',
            'id_department' => 'numeric',
            'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_university' => 'numeric',
            'id_faculty' => 'numeric',
            'id_career' => 'numeric',
            'id_periodo' => 'required',
        ],[
            'ci.unique' => 'El numero de carnet ya esta siendo Utilizado',
            'a_paterno.alpha' => 'El Apellido Paterno debe contener solo Letras',
            'a_paterno.required' => 'El Apellido Paterno es Obligatorio',
            'a_materno.alpha' => 'El Apellido Materno debe contener solo Letras',
            'a_materno.required' => 'El Apellido Materno es Obligatorio',
            'name_student.alpha' => 'El Nombre Estudiante debe contener solo Letras',
            'name_student.required' => 'El Nombre Estudiante es Obligatorio',
            'addrees.required' => 'Debe llenar la direccion del Estudiante',
            'birth_date.required' => 'Debe llenar este Campo',
            'ci.required' => 'El Numero de Carnet es Obligatorio',
            'email.required' => 'El Correo Electronico es Obligatorio',                
            'phone.numeric' => 'El Telefono debe ser Numerico',
            'id_department.numeric' => 'Seleccione un Departamento',  
            'id_province.numeric' => 'Seleccione una Provincia',    
            'id_municipality.numeric' => 'Seleccione un Municipio',
            'id_faculty.numeric' => 'Seleccione una Facultad',
            'id_university.numeric' => 'Seleccione una Universidad',
            'id_career.numeric' => 'Seleccione una Carrera',
            'id_periodo.required' => 'Debe seleccionar un Periodo',
        ]);
            $type_internship = Carrer::find($request->id_career);
            $new_student = new Student();
            $new_student->name = request ('name_student');
            $new_student->ap_pat = request ('a_paterno');
            $new_student->ap_mat = request ('a_materno');
            $new_student->ci = request ('ci');
            $new_student->exp = request ('exp');
            $new_student->birth_date = request ('birth_date');
            $new_student->celular = request ('phone');
            $new_student->id_date_enabled = request ('id_periodo');
            $new_student->correo = request ('email');
            $new_student->direccion = request ('addrees');
            $new_student->sexo = request ('genero');
            $new_student->level_ac = $type_internship->type_internation;
            $new_student->type = true;
            $new_student->insti_id = 1;
            $new_student->carrer_id = request ('id_career');
            $new_student->caso_esp = 1;
            $new_student->user_create = \Auth::user()->id;
            $new_student->save();
        
		return redirect()->route('register_new_student')
            ->with('info', [
                'status' => $status,
                'content' => $conent
        ]); 
    }
    public function edit_students(Request $request)
    {        
        $student = (Student::edit_student($request->id));
        $departments = Departamento::all();          
        if($student->type == 0){
            $uni = Student::edit_student_inst($request->id);
            $prov = Student::find_province($uni->id_depart);
            $municipalities = Student::find_municipalities($uni->id_province);
            $institutes = Student::find_institutes($uni->id_municipality);
            $careers_insitutes = Student::find_careers_insitutes($uni->id_institute);
            //return \Response::json($uni);
            return view('students.edit',compact('student','uni','departments','prov','municipalities','institutes','careers_insitutes'));
            
            
        }elseif($student->type == 1){
            //para universidades
            $uni = Student::edit_student_uni($request->id);
            $prov = Student::find_province($uni->id_depart);
            $municipalities = Student::find_municipalities($uni->id_province);
            $universities = Student::find_universities($uni->id_municipality);
            $faculties = Student::find_faculties($uni->id_universidad);
            $faculties_careers = Student::find_faculties_careers($uni->id_faculty);
            //return \Response::json($uni);
            return view('students.edit',compact('student','uni','departments','prov','municipalities','universities','faculties','faculties_careers'));
            
        }
        
    }

    public function show_students(Request $request)
    {
        $student = (Student::show_student($request->id));        
        return view('students.show',compact('student'));
    }


    public function update_students(Request $request, $id)
    {
        $status = 'success';
        $conent = 'El Estudiante'. $request->name .' fue Registrado Correctamente';
        $request->validate([
            'type_uni_inst' => 'required',
        ],[
            'type_uni_inst.required' => 'Usted debe seleccionar una Institucion Educativa',
        ]);
        if($request->type_uni_inst === 'universidad'){
            $request->validate([
                'a_paterno' => 'required|alpha',
                'a_materno' => 'required|alpha',
                'name_student' => 'required|alpha',
                'addrees' => 'required',
                'birth_date' => 'required',
                'ci' => 'required|unique:student,ci,'.$id,
                'email' => 'required',
                //'exp' => 'required',
                //'genero' => 'required',
                'phone' => 'numeric',
                //validate para el formulario de institucion educativa
                'id_department' => 'numeric',
                'id_province' => 'numeric',
                'id_municipality' => 'numeric',
                'id_university' => 'numeric',
                'id_faculty' => 'numeric',
                'id_career' => 'numeric',
            ],[
                'ci.unique' => 'El numero de carnet ya esta siendo Utilizado',
                'a_paterno.alpha' => 'El Apellido Paterno debe contener solo Letras',
                'a_paterno.required' => 'El Apellido Paterno es Obligatorio',
                'a_materno.alpha' => 'El Apellido Materno debe contener solo Letras',
                'a_materno.required' => 'El Apellido Materno es Obligatorio',
                'name_student.alpha' => 'El Nombre Estudiante debe contener solo Letras',
                'name_student.required' => 'El Nombre Estudiante es Obligatorio',
                'addrees.required' => 'Debe llenar la direccion del Estudiante',
                'birth_date.required' => 'Debe llenar este Campo',
                'ci.required' => 'El Numero de Carnet es Obligatorio',
                'email.required' => 'El Correo Electronico es Obligatorio',                
                'phone.numeric' => 'El Telefono debe ser Numerico',

                'id_department.numeric' => 'Seleccione un Departamento',  
                'id_province.numeric' => 'Seleccione una Provincia',    
                'id_municipality.numeric' => 'Seleccione un Municipio',
                'id_faculty.numeric' => 'Seleccione una Facultad',
                'id_university.numeric' => 'Seleccione una Universidad',
                'id_career.numeric' => 'Seleccione una Carrera',
                      
            ]);
                $save_student = Student::find($id);
                $save_student->name = $request->name_student;
                $save_student->ap_pat = $request->a_paterno;
                $save_student->ap_mat = $request->a_materno;
                $save_student->ci = $request->ci;
                $save_student->exp = $request->exp;
                $save_student->birth_date = $request->birth_date;
                $save_student->celular = $request->phone;
                $save_student->correo = $request->email;
                $save_student->sexo = $request->genero;
                $save_student->direccion = $request->addrees;
                $save_student->carrer_id = $request->id_career;
                //$save_student->caso_esp = $request->caso_esp;
                $save_student->save();
                return redirect()->route('index_students')
                    ->with('info', [
                        'status' => $status,
                        'content' => $conent
                    ]);
        }else{
            $request->validate([
                'a_paterno' => 'required|alpha',
                'a_materno' => 'required|alpha',
                'name_student' => 'required|alpha',
                'addrees' => 'required',
                'birth_date' => 'required',
                'ci' => 'required|unique:student,ci,'.$id,
                'email' => 'required',
                'exp' => 'required',
                'genero' => 'required',
                'phone' => 'numeric',
                'id_department' => 'numeric',
                'id_province' => 'numeric',
                'id_municipality' => 'numeric',
                'id_institute' => 'numeric',
                'id_career' => 'numeric'    
            ],[
                //validacion para el formulario de institucion educativa
                'ci.unique' => 'El numero de carnet ya esta siendo Utilizado',
                'a_paterno.alpha' => 'El Apellido Paterno debe contener solo Letras',
                'a_paterno.required' => 'El Apellido Paterno es Obligatorio',
                'a_materno.alpha' => 'El Apellido Materno debe contener solo Letras',
                'a_materno.required' => 'El Apellido Materno es Obligatorio',
                'name_student.alpha' => 'El Nombre Estudiante debe contener solo Letras',
                'name_student.required' => 'El Nombre Estudiante es Obligatorio',
                'addrees.required' => 'Debe llenar la direccion del Estudiante',
                'birth_date.required' => 'Debe llenar este Campo',
                'ci.required' => 'El Numero de Carnet es Obligatorio',
                'email.required' => 'El Correo Electronico es Obligatorio',                
                'phone.numeric' => 'El Telefono debe ser Numerico',

                'id_department.numeric' => 'Seleccione un Departamento',  
                'id_province.numeric' => 'Seleccione una Provincia',    
                'id_municipality.numeric' => 'Seleccione un Municipio',
                'id_institute.numeric' => 'Seleccione un Instituto',
                'id_career.numeric' => 'Seleccione una Carrera',
            ]);
            $save_student = Student::find($id);
            $save_student->name = $request->name_student;
            $save_student->ap_pat = $request->a_paterno;
            $save_student->ap_mat = $request->a_materno;
            $save_student->ci = $request->ci;
            $save_student->exp = $request->exp;
            $save_student->birth_date = $request->birth_date;
            $save_student->celular = $request->phone;
            $save_student->correo = $request->email;
            $save_student->sexo = $request->genero;
            $save_student->direccion = $request->addrees;
            $save_student->insti_id = $request->id_career;
            //$save_student->caso_esp = $request->caso_esp;
            $save_student->save();
            return redirect()->route('/')
                ->with('info', [
                    'status' => $status,
                    'content' => $conent
                ]);

        }
    }

    public function delete_students(Request $request)
    {   
        $name = Student::find($request->id);
        $status = 'success';
        $conent = 'El Estudiante '. $name->name_career .' fue Aliminado Correctamente';    
        try {
            $institute = Student::find($request->id)->delete();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'El Estudiante '. $request->name_career .' no fue Eliminado';   
        }
        
        return redirect()->route('index_students')
        ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
    public function cargar_uni(Request $request){
        $depa = "SELECT * FROM univeridads WHERE depart_id = :id";
        $uni = \DB::select(\DB::raw($depa),array('id'=>$request->id));
        $depa = "SELECT * FROM institutos WHERE depart_id = :id";
        $insti = \DB::select(\DB::raw($depa),array('id'=>$request->id));
        $val = ['univ'=>$uni,'insti'=>$insti];
        return $val;
    }

    public function cargar_carre_unir(Request $request){
        $carrer = "SELECT * FROM carrer WHERE univ_id = :id";
        $carrer_uni = \DB::select(\DB::raw($carrer),array('id'=>$request->id));
        return $carrer_uni;
    }

    public function cargar_carrer(Request $request){
        $uni = "SELECT * FROM carrer WHERE carrer_id = :id";
        $carr = \DB::select(\DB::raw($uni),array('id'=>$request->id));
        return $carr;
    }
    public function load_uni(Request $request){
        $departments = Departamento::get();
        return view('students.components.universities',compact('departments'));
    }
    public function load_faculty_careers(Request $request){
        return \DB::table('career')
        ->where('career.faculty_id','=',$request->id)
        ->get();
    }
    public function load_insti(Request $request){
        $departments = Departamento::get();
        return view('students.components.institute',compact('departments'));
    }
    //funcion para exportar excel
    public function export_students_excel() 
    {
        return Excel::download(new StudentsExport, 'invoices.xlsx');
    }


    //funciones para exportar pdf's
    public function generate_students_pdf(){
        setlocale(LC_ALL, 'es_ES');
        $pdf = app('dompdf.wrapper');
        $students = Student::view_test();
        //$designate_date = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->designation_date));
        //$dat2 = $designate_date->formatLocalized(' %d de %B del %Y');
        return \PDF::loadView('reports.students',compact('students'))->setPaper('letter', 'landscape')->stream('Estudantes Registrados.pdf');
    }
    public function import_students(Request $request){
        $status = 'success';
        $conent = 'La lista de Estudiantes se Registro Correctamente.';
        $p = $request->id_periodo;
        $c = $request->id_career;
        $file = $request->file('file');
        Excel::import(new StudentImport($p,$c), $file);
        return back() ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
}
