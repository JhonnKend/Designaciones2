<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Univeridad;
use App\Departamento;
use App\Province;
use App\Carrer;
use App\Faculty;
use App\InternshipTipes;
use App\Rules\ContrasenaFuerte;
use App\Student;
use App\User;

class UniversityController extends Controller
{
    public function index_universities()
    {
        $universities = Univeridad::view_university();
        return view('universities.index',compact('universities'));
    }
    public function show_universities(Request $request){
        $university = Univeridad::show_university($request->id);
		return view('universities.show',compact('university'));
    }
    public function create_universities(){
		$departments = Departamento::get();
		return view('universities.create',compact('departments'));
    }
    public function store_universities(Request $request){
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'name_university' => 'required|unique:univeridads',     
        ],[
            'name_university.required' => 'El Nombre de Universidad es Requerido',
			'name_university.unique' => 'El valor del campo Universidad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        $univercity = new Univeridad();
        $univercity->name_university = request ('name_university');
		$univercity->id_municipality = $request->id_municipality;
        $univercity->user_create = \Auth::user()->id;
        $univercity->save();
        $ultimo = \DB::table('univeridads')->where('name_university','=',request ('name_university'))->get(['univeridads.id'])->first();
        $usuario = new User();
        $usuario->name = request ('name_university');
        $usuario->email = request ('email_uni');
        $usuario->type_user = 2;
        $usuario->id_universidad = $ultimo->id;
        $usuario->password = bcrypt('password');
        $usuario->save();
        return redirect()->route('create_universities', $univercity->id)
            ->with('info', 'Rol registrado con  éxito');
    }
    public function edit_universities(Request $request){
        $univercity_edit = Univeridad::find_edit_university($request->id);
        $departments = Departamento::all();        
		$prov = Province::find($univercity_edit[0]->id);
		$province = \DB::table('provinces')
			->where('provinces.id_department','=',$univercity_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$univercity_edit[0]->id_province)
		->get();
		return view('universities.edit',compact('univercity_edit','departments','province','municipalities'));
    }
    public function update_universities(Request $univercity_update){
        $univercity_update->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'name_university' => 'required|unique:univeridads,name_university,'.$univercity_update->id,
        ],[
            'name_university.required' => 'El Nombre de Universidad es Requerido',
			'name_university.unique' => 'El valor del campo Universidad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',            
        ]);
        $save_university = Univeridad::find($univercity_update->id);
        $save_university->name_university = $univercity_update->name_university;
		$save_university->id_municipality = $univercity_update->id_municipality;
        $save_university->user_create = \Auth::user()->id;
        $save_university->save();
        return redirect()->route('index_universities', $save_university->id)
            ->with('info', 'Los Registros de la Universidad'. $univercity_update->name_university .'fue actualizada con  éxito');
    }
    public function index_faculties(){
        $faculties = Faculty::view_faculties();
        return view('universities.faculties.index',compact('faculties'));
    }
    public function show_faculties(Request $request){
        $faculty = Faculty::show_faculty($request->id);
		return view('universities.faculties.show',compact('faculty'));
    }
    public function create_faculties(){
        $departments = Departamento::get();
        return view('universities.faculties.create',compact('departments'));
    }
    public function store_faculties(Request $request){
        $validator = $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_university' => 'numeric',
            'name_faculty' => 'required',            
        ],[
            'name_faculty.required' => 'El Nombre de la Facultad es Requerido',
			'name_faculty.unique' => 'El Nombre de la Facultad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento', 
            'id_university.numeric' => 'Seleccione una Universidad',            
        ]);
        //return $validator;
        $faculty = new Faculty();
        $faculty->name_faculty = request ('name_faculty');
        $faculty->description = request ('description');
		$faculty->id_university = $request->id_university;
        $faculty->user_create = \Auth::user()->id;
        $faculty->save();
        return redirect()->route('create_faculties', $faculty->id)
            ->with('info', 'Faculta Registrada con  éxito');
    }
    public function edit_faculties(Request $request){
        $faculty_edit = Faculty::find_edit_faculty($request->id);
        $departments = Departamento::all();        
		$prov = Province::find($faculty_edit[0]->id);
		$province = \DB::table('provinces')
			->where('provinces.id_department','=',$faculty_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$faculty_edit[0]->id_province)
        ->get();
        $universities = \DB::table('univeridads')
			->where('univeridads.id_municipality','=',$faculty_edit[0]->id_municipality)
		->get();
        return view('universities.faculties.edit',compact('faculty_edit','departments', 'prov', 'province','municipalities','universities'));
    }
    public function update_faculties(Request $request, $id){
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_university' => 'numeric',
            'name_faculty' => 'required|unique:faculties,name_faculty,'.$request->id,
        ],[
            'name_faculty.required' => 'El Nombre de la Facultad es Requerido',
			'name_faculty.unique' => 'El Nombre de la Facultad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento', 
            'id_university.numeric' => 'Seleccione una Universidad',            
        ]);
        $update_faculty = Faculty::find($request->id);
        $update_faculty->name_faculty = $request->name_faculty;
        $update_faculty->description = $request->description;
		$update_faculty->id_university = $request->id_university;
        $update_faculty->user_create = \Auth::user()->id;
        $update_faculty->save();
        return redirect()->route('index_faculties', $update_faculty->id)
            ->with('info', 'Los Registros de la Facultad'. $update_faculty->nombre .'fueron actualizados con  éxito');
    }
    public function delete_faculties(Request $request){
        return "te falta este parte";
    }
    public function index_careers(){
        $careers = Carrer::view_careers();
        return view('universities.careers.index',compact('careers'));
    }
    public function create_careers(){
        $types_internations = InternshipTipes::get_type_int();
        $departments = Departamento::get();
        return view('universities.careers.create',compact('departments','types_internations'));
    }
    public function store_careers(Request $request){
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_university' => 'numeric',
            'id_faculty' => 'numeric',
            'name_career' => 'required',            
        ],[
            'name_career.required' => 'El Nombre de la Facultad es Requerido',
			'name_career.unique' => 'El Nombre de la Facultad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento', 
            'id_university.numeric' => 'Seleccione una Universidad',
            'id_faculty.numeric' => 'Seleccione una Facultad',        
        ]);
        $career = new Carrer();
        $career->name_career = request ('name_career');
        $career->description = request ('description');
        $career->type_internation = request ('type_in');
		$career->faculty_id = $request->id_faculty;
        $career->user_create = \Auth::user()->id;
        $career->save();
        return redirect()->route('create_careers', $career->id)
            ->with('info', 'Carrera Registrada con  éxito');
    }
    public function show_careers(Request $request){
        $career = Carrer::show_career($request->id);
        return view('universities.careers.show',compact('career'));
    }
    public function edit_careers(Request $request){    
        $types_internations = InternshipTipes::get_type_int();
        $career_edit = Carrer::find_edit_career($request->id);
        $departments = Departamento::all();        
		$prov = Province::find($career_edit[0]->id);        
        $province = \DB::table('provinces')
			->where('provinces.id_department','=',$career_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$career_edit[0]->id_province)
        ->get();
        $universities = \DB::table('univeridads')
			->where('univeridads.id_municipality','=',$career_edit[0]->id_municipality)
        ->get();    
        $faculties = \DB::table('faculties')
			->where('faculties.id_university','=',$career_edit[0]->id_university)
		->get();    
        return view('universities.careers.edit',compact('types_internations','career_edit','departments', 'prov', 'province','municipalities','universities','faculties'));
    }
    public function update_careers(Request $request, $id){
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'id_university' => 'numeric',
            'id_faculty' => 'numeric',
            'name_career' => 'required',            
        ],[
            'name_career.required' => 'El Nombre de la Facultad es Requerido',
			'name_career.unique' => 'El Nombre de la Facultad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento', 
            'id_university.numeric' => 'Seleccione una Universidad',
            'id_faculty.numeric' => 'Seleccione una Facultad',        
        ]);
        $update_career = Carrer::find($request->id);
        $update_career->name_career = $request->name_career;
        $update_career->description = $request->description;
        $update_career->type_internation = $request->type_in;
        $update_career->faculty_id = $request->id_faculty;
        $update_career->user_create = \Auth::user()->id;
        $update_career->save();
        return redirect()->route('index_careers', $update_career->id)
            ->with('info', 'Los Registros de la Carrera'. $update_career->nombre .'fueron actualizados con  éxito');
    }
    public function delete_careers(Request $request){
        return "Falta esta parte";
    }
    public function charge_universities(Request $request){
        return Univeridad::load_universities($request->id);
    }
    public function charge_faculties(Request $request){
        return Faculty::find_faculties($request->id);
    }
    //Funcion para ver el perfil de una iniversidad
    public function view_perfil(){
        $perfil_university = Univeridad::get_dates_perfil(\Auth::user()->id_universidad);
        return view('universities.perfil.view_perfil',compact('perfil_university'));
    }
    public function index_my_faculties(){
        $faculties = Faculty::view_my_faculties(\Auth::user()->id_universidad);
        return view('universities.perfil.index_my_faculties',compact('faculties'));
    }
    public function create_my_faculty(){
        $perfil_university = Univeridad::get_dates_perfil(\Auth::user()->id_universidad);
        return view('universities.perfil.create_my_faculties',compact('perfil_university'));
    }
    public function store_my_faculties(Request $request){
        $validator = $request->validate([
            'id_university' => 'numeric',
            'name_faculty' => 'required',            
        ],[
            'name_faculty.required' => 'El Nombre de la Facultad es Requerido',
			'name_faculty.unique' => 'El Nombre de la Facultad ya está en uso',
            'id_university.numeric' => 'Seleccione una Universidad',            
        ]);
        //return $validator;
        $faculty = new Faculty();
        $faculty->name_faculty = request ('name_faculty');
        $faculty->description = request ('description');
		$faculty->id_university = $request->id_university;
        $faculty->user_create = \Auth::user()->id_universidad;
        $faculty->save();
        return redirect()->route('create_my_faculty', $faculty->id)
            ->with('info', [
                'status' => 'success',
                'content' => 'Facultad Registrada con  éxito'
                
            ]);
    }
    public function index_my_careers(){
        $university_my_careers = Carrer::get_university_my_careers(\Auth::user()->id_universidad);
        return view('universities.perfil.view_my_careers',compact('university_my_careers'));
    }
    public function create_my_careers(){
        $types_internations = InternshipTipes::get_type_int();
        $perfil_university = Univeridad::get_dates_perfil(\Auth::user()->id_universidad);
        $faculties = Faculty::view_my_faculties(\Auth::user()->id_universidad);
        return view('universities.perfil.create_careers',compact('faculties','types_internations','perfil_university'));
    }
    public function store_my_careers(Request $request){
        $request->validate([
            'id_faculty' => 'numeric',
            'type_in' => 'numeric',
            'name_career' => 'required',            
        ],[
            'name_career.required' => 'El Nombre de la Facultad es Requerido',
			'name_career.unique' => 'El Nombre de la Facultad ya está en uso',
			'type_in.numeric' => 'Seleccione un Tipo de Internado',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento', 
            'id_university.numeric' => 'Seleccione una Universidad',
            'id_faculty.numeric' => 'Seleccione una Facultad',        
        ]);
        $career = new Carrer();
        $career->name_career = request ('name_career');
        $career->description = request ('description');
        $career->type_internation = request ('type_in');
		$career->faculty_id = $request->id_faculty;
        $career->user_create = \Auth::user()->id;
        $career->save();
        return redirect()->route('create_careers', $career->id)
            ->with('info', 'Carrera Registrada con  éxito');
    }
    public function view_students_university(Request $request){
        if(\Auth::user()->type_user == 2){
            $careers = Carrer::show_careers(\Auth::user()->id_universidad);
            return view('universities.students.show',compact('careers'));
        }
    }
    public function search_students(Request $request){
        $studiantes = Student::studiantes($request->id_carrera);
        return view('universities.students.load_students',compact('studiantes'));
    }
    public function register_new_student(){
        $departments = Departamento::all();
        $my_uni = Univeridad::find(\Auth::user()->id_universidad);
        $my_faculties = \DB::table('faculties')
            ->where('faculties.id_university','=',\Auth::user()->id_universidad)
            ->get([
                'faculties.id AS id_faculty',
                'name_faculty',
           
            ]);
        return view('universities.students.form_students_uni',compact('departments','my_uni','my_faculties'));
    }
}
