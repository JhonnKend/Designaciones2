<?php

namespace App\Http\Controllers;

use App\Univeridad;
use App\Instituto;
use App\Carrer;
use App\Cod_red;
use App\Departamento;
use App\Province;
use App\Municipality;
use App\Community;
use Illuminate\Http\Request;

class ConguracionController extends Controller
{
	public function index_departments(){
		$departments = Departamento::paginate(20);
		return view('config.departments.index',compact('departments'));
	}
	public function create_departments(){
		return view('config.departments.create');
	}
	public function store_departments(Request $request){
		$request->validate([
            'name_department' => 'required|unique:departamentos',
            'cod_depa' => 'required|unique:departamentos',       
        ],[
            'name_department.required' => 'El campo Nombre Departamento es requerido',
			'name_department.unique' => 'El valor del campo Nombre Departamento ya está en uso',
			'cod_depa.required' => 'El campo Codigo Departamento es requerido',
            'cod_depa.unique' => 'El valor del campo Codigo Departamento ya está en uso'
        ]);
		$department = new Departamento();
        $department->name_department = request ('name_department');
        $department->cod_depa = request ('cod_depa');
        $department->user_create = \Auth::user()->id;
        $department->save();
        return redirect()->route('create_departments', $department->id)
            ->with('info', 'Rol registrado con  éxito');
	}
	public function show_departments(Request $request){
		$department = Departamento::show_department($request->id);
		return view('config.departments.show',compact('department'));
	}	
	public function edit_departments(Request $request){
		$department_edit = Departamento::edit_department($request->id);
		return view('config.departments.edit',compact('department_edit'));
	}
	public function update_departments(Request $request, Departamento $departamento){
		$department =  Departamento::find($departamento->id);
        $department->name_department = $request->get('name_department');
		$department->cod_depa = $request->get('cod_depa');
		$department->updated_at = date("Y-m-d H:i:s");
		$department->update();
		return redirect()->route('index_departments')
            ->with('info', 'Rol registrado con  éxito');
	}
	public function delete_departments(Request $request){
		$departamento= Departamento::find($request->id)->delete();
        return redirect()->route('index_departments')->with('info', ' Eliminado correctamente');
	}

	public function index_provinces(){
		$provinces = Province::view_provinces();
		return view('config.provinces.index',compact('provinces'));
	}
	public function create_provinces(){
		$departments = Departamento::paginate(20);		
		return view('config.provinces.create',compact('departments'));
	}
	public function store_provinces(Request $request){
		$request->validate([
            'name_province' => 'required|unique:provinces',
            'cod_prov' => 'required|unique:provinces',       
        ],[
            'name_province.required' => 'El campo Nombre Provincia es requerido',
			'name_province.unique' => 'El valor del campo Nombre Provincia ya está en uso',
			'cod_prov.required' => 'El campo Codigo Provincia es requerido',
            'cod_prov.unique' => 'El valor del campo Codigo Provincia ya está en uso'
		]);
		$dep = Departamento::find($request->department);
		$provincie = new Province();
        $provincie->name_province = request ('name_province');
		$provincie->cod_prov = request ('cod_prov');
		$provincie->cod_depa = $dep->cod_depa;
		$provincie->id_department = $dep->id;
        $provincie->user_create = \Auth::user()->id;
        $provincie->save();
        return redirect()->route('create_provinces', $provincie->id)
            ->with('info', 'Rol registrado con  éxito');
	}
	
	public function show_provinces(Request $request){
		$provinces = Province::show_province($request->id);
		return view('config.provinces.show',compact('provinces'));
	}
	public function edit_provinces(Request $request){
		$province_edit = Province::find($request->id);
		$departments = Departamento::all();
		//return $departments;
		return view('config.provinces.edit',compact('departments','province_edit'));
	}
	public function update_provinces(Request $request,Province $id){
		$request->validate([
            'name_province' => 'required',
            'cod_prov' => 'required',       
        ],[
            'name_province.required' => 'El campo Nombre Provincia es requerido',
			'cod_prov.required' => 'El campo Codigo Provincia es requerido',
		]);
		$province =  Province::find($id->id);
        $province->name_province = $request->get('name_province');
		$province->cod_prov = $request->get('cod_prov');
		$province->id_department = $request->get('department');
		$province->updated_at = date("Y-m-d H:i:s");
		$province->user_create = \Auth::user()->id;
		$province->update();
		return redirect()->route('index_provinces')
            ->with('info', 'Rol registrado con  éxito');
	}
	public function delete_provinces(Request $request){
		$province= Province::find($request->id)->delete();
        return redirect()->route('index_provinces')->with('info', ' Eliminado correctamente');
	}

	//Funciones para municipios
	public function index_municipalities(){
		$municipalities = Municipality::view_municipalities();		
		return view('config.municipalities.index',compact('municipalities'));
	}
	public function create_municipalities(){
		$departments = Departamento::get();
		$cod_red = Cod_red::paginate(20);
		return view('config.municipalities.create',compact('departments','cod_red'));
	}
	public function load_prov(Request $request){
		return \DB::table('provinces')		
			->where('provinces.id_department','=',$request->id)
		->get();
	}
	public function store_municipalities(Request $request){
		//return $request->all();
		$request->validate([
            'name_municipality' => 'required|unique:municipalities',
			'cod_muni' => 'required|unique:municipalities',      
			'id_cod_red' => 'numeric',       
        ],[
            'name_municipality.required' => 'El campo Nombre Municipio es requerido',
			'name_municipality.unique' => 'El valor del campo Nombre Municipio ya está en uso',
			'cod_muni.required' => 'El campo Codigo Municipio es requerido',
			'cod_muni.unique' => 'El valor del campo Codigo Municipio ya está en uso',
			'id_cod_red.numeric' => 'Seleccione una Red'
		]);	
		$prov = Province::find($request->id_province);	
		$municipality = new Municipality();
		//return $municipality;nombre_red
        $municipality->name_municipality = request ('name_municipality');
		$municipality->cod_muni = request ('cod_muni');
		$municipality->id_province = $prov->id;
		$municipality->cod_prov = $prov->cod_prov;
		$municipality->cod_red = request ('id_cod_red');
        $municipality->user_create = \Auth::user()->id;
        $municipality->save();
        return redirect()->route('create_municipalities', $prov->id)
            ->with('info', 'Rol registrado con  éxito');
	}
	
	public function show_municipalities(Request $request){
		$municipality = Municipality::show_municipality($request->id);
		return view('config.municipalities.show',compact('municipality'));
	}
	public function edit_municipalities(Request $request){
		$municipality_edit = Municipality::find_muni($request->id);
		$departments = Departamento::all();
		$cod_red = Cod_red::all();
		$province = \DB::table('provinces')->where('id_department','=',$municipality_edit[0]->id_departamento)->get();		
		return view('config.municipalities.edit',compact('municipality_edit','departments','province','cod_red'));
	}
	public function update_municipalities(Request $request,Municipality $id){
		$request->validate([
            'name_municipality' => 'required',
			'cod_muni' => 'required',     
			'id_cod_red' => 'numeric',     
        ],[
            'name_municipality.required' => 'El campo Nombre Municipio es requerido',
			'cod_muni.required' => 'El campo Codigo Municipio es requerido',
			'id_cod_red.numeric' => 'Seleccione una Red'
		]);
		$municipality =  Municipality::find($id->id);
        $municipality->name_municipality = $request->get('name_municipality');
		$municipality->cod_muni = request ('cod_muni');

		$municipality->cod_muni = request ('id_cod_red');
		
		$municipality->id_province = $request->id_province;
		$municipality->cod_red = request ('id_cod_red');
		$municipality->cod_muni = $request->cod_muni;

		$municipality->updated_at = date("Y-m-d H:i:s");
        $municipality->user_create = \Auth::user()->id;
		$municipality->save();
		
		return redirect()->route('index_municipalities')
            ->with('info', 'Rol registrado con  éxito');
	}
	public function delete_municipalities(Request $request){
		$province= Municipality::find($request->id)->delete();
        return redirect()->route('index_municipalities')->with('info', ' Eliminado correctamente');
	}

	//Funciones para Comunidades
	public function index_communities(){
		$communities = Community::view_communities();		
		return view('config.communities.index',compact('communities'));
	}
	public function create_communities(){
		$departments = Departamento::get();
		return view('config.communities.create',compact('departments'));
	}
	public function load_prov_muni(Request $request){
		return \DB::table('municipalities')		
			->where('municipalities.id_province','=',$request->id)
		->get();
	}
	public function store_communities(Request $request){
		$request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
			'id_municipality' => 'numeric',
            'name_community' => 'required|unique:communities',
            'cod_comu' => 'required|unique:communities',       
        ],[
            'name_community.required' => 'El campo Nombre Comunidad es requerido',
			'name_community.unique' => 'El valor del campo Nombre Comunidad ya está en uso',
			'cod_comu.required' => 'El campo Codigo Comunidad es requerido',
			'cod_comu.unique' => 'El valor del campo Codigo Comunidad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
			'id_department.numeric' => 'Seleccione un Departamento'
		]);	
		$mun = Municipality::find($request->id_municipality);	
		$community = new Community();
        $community->name_community = request ('name_community');
		$community->cod_comu = request ('cod_comu');
		$community->id_muni = $request->id_municipality;		
		$community->cod_muni = $mun->cod_muni;
        $community->user_create = \Auth::user()->id;
        $community->save();
        return redirect()->route('create_communities', $mun->id)
            ->with('info', 'Rol registrado con  éxito');
	}	
	public function show_communities(Request $request){
		$community = Community::show_community($request->id);
		return view('config.communities.show',compact('community'));
	}
	public function edit_communities(Request $request){
		$community_edit = Community::find_cominity_edit($request->id);
		$departments = Departamento::all();
		$prov = Province::find($community_edit[0]->id);
		$province = \DB::table('provinces')
			->where('provinces.id_department','=',$community_edit[0]->id_department)
		->get();
		$municipalities = \DB::table('municipalities')
			->where('municipalities.id_province','=',$community_edit[0]->id_province)
		->get();
		return view('config.communities.edit',compact('community_edit','departments','province','municipalities'));
	}
	public function update_communities(Request $request,Municipality $id){
		$request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
			'id_municipality' => 'numeric',
            'name_community' => 'required|unique:communities,name_community,'.$id->id,
            'cod_comu' => 'required|unique:communities,cod_comu,'.$id->id,       
        ],[
            'name_community.required' => 'El campo Nombre Comunidad es requerido',
			'name_community.unique' => 'El valor del campo Nombre Comunidad ya está en uso',
			'cod_comu.required' => 'El campo Codigo Comunidad es requerido',
			'cod_comu.unique' => 'El valor del campo Codigo Comunidad ya está en uso',
			'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
			'id_department.numeric' => 'Seleccione un Departamento'
		]);	
		$community =  Community::find($id->id);
        $community->name_community = $request->get('name_community');
		$community->cod_comu = request ('cod_comu');
		
		$community->id_muni = $request->id_municipality;
		
		$community->cod_comu = $request->cod_comu;

		$community->updated_at = date("Y-m-d H:i:s");
        $community->user_create = \Auth::user()->id;
		$community->save();
		
		return redirect()->route('index_communities')
            ->with('info', 'Rol registrado con  éxito');
	}
	public function delete_communities(Request $request){
		$community= Community::find($request->id)->delete();
        return redirect()->route('index_communities')->with('info', ' Eliminado correctamente');
	}
	/*public function index_departments(){}
	public function create_departments(){}
	public function store_departments(Request $request){}	
	public function show_departments(Request $request){}
	public function edit_departments(Request $request){}
	public function update_departments(Request $request,Id $id){}
	public function delete_departments(Request $request){}*/
	

}
