<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipTipes;
use App\Quotas;
use App\Departamento;
use App\Designacion;
use App\Enable_periods;
use App\EstableSalud;
use App\Student;
use App\Gestion;
use App\Periods;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DesignationsExport;
use Symfony\Component\Console\Descriptor\Descriptor;

class DesignationsController extends Controller
{
    public function index_internship_types(){
        $internship_types = InternshipTipes::index_internship_types();
        return view('designations.internship.index',compact('internship_types'));
    }
    public function create_internship_types(){
        return view('designations.internship.create');
    }
    public function store_internship_types(Request $request){
        $status = 'success';
        $conent = 'El Tipo de internado'. $request->name_institute .' fue Registrado Correctamente';
        $request->validate([
            'name_internship_types' => 'required',  
            'level_ac' => 'numeric',  
        ],[
            'name_internship_types.required' => 'Este campo es Requerido',   
            'level_ac.numeric' => 'Debe seleccionar un Nivel',        
        ]);
        $career = new InternshipTipes();
        $career->name_type = request ('name_internship_types');
        $career->description = request ('description');
        $career->level_ac = request ('level_ac');
        $career->user_create = \Auth::user()->id;
        $career->save();
        return redirect()->route('create_internship_types', $career->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function edit_internship_types (Request $request){
        $edit_internship_type = InternshipTipes::edit_internship_types($request->id);
        return view('designations.internship.edit',compact('edit_internship_type'));
    }
    public function update_internship_types(Request $request, InternshipTipes $id){
        $status = 'success';
        $conent = 'El Tipo de Internado '. $request->name_internship_types .' fue actualizado Correctamente';
        $request->validate([
			'name_internship_types' => 'required|unique:internation_types,name_type,'.$id->id,  
        ],[
            'name_internship_types.required' => 'Este campo es Requerido',
            'name_internship_types.unique' => 'El tipo de internado ya esta siendo usado'
        ]);
        $id->name_type = $request->name_internship_types;
        $id->description = $request->description;
        $id->save();
        return redirect()->route('index_internship_types', $id->id)
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function show_internship_types(Request $request){
        return view('designations.internship.show');
    }
    public function delete_internship_types(Request $request){
        return "Borrar";
    }

    //Metodos para el control de Cupos para Designacions

    public function index_quotas(){
        $quotas = Quotas::quotas_index();   
        $tipos_internado = \DB::table('internation_types')->where('internation_types.level_ac','=',1)->get();
        $gestion = Gestion::get();
        $periodo = Periods::get();     
        return view('designations.quotas.index',compact('quotas','gestion','periodo','tipos_internado'));
    }
    /* Para poder ver la lista de periodos por gestion */
    public function load_view(Request $request){
        $periodos_habilitados = Designacion::ver_periodos_gestion($request->id);
        return view('designations.quotas.periodos_index',compact('periodos_habilitados'));
    }
    /* para cargar lista de centros medicos con sus cupos */ 
    public function cargar_lsita_centros_medicos_cupos(Request $request){
        //return "Holas como estas";
        $gestion = $request->gestion;
        $periodo = $request->periodo;
        $list_medical_centers = EstableSalud::list_medical_centers($request->gestion, $request->periodo);
        $tipos_internado = \DB::table('internation_types')->where('internation_types.level_ac','=',1)->get();
        return view('designations.quotas.components.table_lista_centros_medicos',compact('list_medical_centers','tipos_internado','gestion','periodo'));
    }
    public function guardar_cupos(Request $request){
        //Para poder guardar la cantidad de cupos de cada tipo y cada centro medico cant_cupos
        if($request->res[0] === "med"){
            $m = 1;
            $estado = Designacion::count_cupos_medicos($request->id_centro_salud,$request->ges,$request->per,$m);
            $num = count($estado);
            if($num != 0){
                $cant_c = Designacion::cant_cupos_registrados($request->id_centro_salud,$request->ges,$request->per,$m);
                $cant = count($cant_c);
                return $request->cant_cupos;
            }else{
                return "No se puede Modificar por que hay Estudiantes Designados...";
            }
        }if($request->res[0] === "enf"){
            return $request->res[0];
        }if($request->res[0] === "den"){
            return $request->res[0];
        }
        /*return $cantidad_cupos = Designacion::cnatidad_cupos($request->id_es, $request->per, $request->ges);
        
        $gestion = $request->ges;
        $periodo = $request->per;
        $id_es = $request->id_es;
        $list_medical_centers = EstableSalud::list_medical_centers($request->ges,$request->per);        
        $tipos_internado = \DB::table('internation_types')->where('internation_types.level_ac','=',1)->get();
        return $cantidad = count(\DB::table('quotas')->where('quotas.gestion','=',$gestion)->where('quotas.periodo','=',$periodo)->where('quotas.id_stable_salud','=',$id_es)->get());
        return view('designations.quotas.components.table_lista_centros_medicos',compact('list_medical_centers','tipos_internado','gestion','periodo'));*/
    }
    public function create_quotas(){
        $departments = Departamento::get();
        $tipes_quotas = InternshipTipes::get();
        $gestion = Gestion::get();
        $periodos = Periods::get();
        return view('designations.quotas.create',compact('departments','tipes_quotas','gestion','periodos'));
    }
    public function store_quotas(Request $request){
        $status = 'success';
        $conent = 'Los cupos fueron Registrados Correctamente';
        $request->validate([
			'id_department' => 'numeric',
			'id_province' => 'numeric',
            'id_municipality' => 'numeric',
            'tipe_internado' => 'numeric',  
            'id_medical_center' => 'numeric',   
            'quantity_qoutas' => 'required|numeric',   
            'start_date' => 'required|date',   
            'end_date' => 'required|date',  
            'periodo' => 'numeric', 
            'gestion' => 'numeric'  
        ],[
            'id_municipality.numeric' => 'Seleccione un Municipio',
			'id_province.numeric' => 'Seleccione una Provincia',
            'id_department.numeric' => 'Seleccione un Departamento',   
            'id_medical_center.numeric' => 'Seleccione un Centro Medico',            
            'tipe_internado.numeric' => 'Seleccione un Centro Medico',   
            'quantity_qoutas.numeric' => 'Este campo acepta solo Numeros',   
            'quantity_qoutas.required' => 'Este campo es requerido',   
            'start_date.required' => 'Este campo es requerido',   
            'start_date.date' => 'Este debe ser de  tipo Fecha',
            'end_date.required' => 'Este campo es requerido',   
            'end_date.date' => 'Este debe ser de  tipo Fecha',   
            'periodo.numeric' => 'Debe seleccionar un periodo',
            'gestion.numeric' => 'Debe seleccionar una gestion',
        ]);  
        $e = 0;      
        $var = $request->quantity_qoutas;
        for($i = 0; $i < $var ; $i++){
            $quotas = new Quotas();
            $quotas->id_stable_salud = request ('id_medical_center');
            $quotas->tipe_internship = $request->tipe_internado;
            $quotas->status_designation = 0;
            $quotas->start_date = request ('start_date');
            $quotas->end_date = request ('end_date');
            $quotas->periodo = request ('periodo');
            $quotas->gestion = request ('gestion');
            $quotas->designation_date = now();
            $quotas->user_create = \Auth::user()->id;
            $quotas->save();
        }
        return redirect()->route('create_quotas')
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function delete_quotas(Request $request){
        $status = 'success';
        $conent = 'El Cupo fue borrado Correctamente';    
        try {
            $institute = Quotas::find($request->id)->delete();
        } catch (\Throwable $th) {
            $status = 'error';
            $conent = 'El Cupo no fue Borrado';   
        }
        
        return redirect()->route('index_quotas')
        ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
    public function load_medical_center_qoutas(Request $request){
        return \DB::table('estable_saluds')
            ->where('estable_saluds.id_muni','=',$request->id)
            ->get();
    }

    // Function for select insti or uni list 
    public function index_internship_draw(){
        return view('designations.designation.start_lists');
        
    }
    public function list_student_univesity(){
        $list_students = Designacion::internship_draw_list_1();
        return view('designations.internship_draw.index',compact('list_students'));
    }
    public function list_student_institute(){
        $list_students = Designacion::internship_draw_list_insti_1();
        return view('designations.internship_draw.index_insti',compact('list_students'));
    }
    public function view_designation(Request $request){
        $student_dates = Designacion::view_designation_student_dates($request->id);
        
        $student = Designacion::view_designation_student($request->id);
        return view('designations.internship_draw.view_details_quotas_students',compact('student','student_dates'));
    }
    public function view_designation_insti(Request $request){
        $student_dates = Designacion::view_designation_student_dates_insti($request->id);        
        $student = Designacion::view_designation_student_insti($request->id);
        return view('designations.internship_draw.view_details_quotas_students_insti',compact('student','student_dates'));
    }
    public function report_certification($id){
        setlocale(LC_ALL, 'es_ES');
        //$fecha = new \Carbon\Carbon::parse('03-04-2018');
        //$fecha->format("F"); // Inglés.
        //$mes = $fecha->formatLocalized('%B');// mes en idioma español
        //$carbon = new \Carbon\Carbon();
        
        //$dat = $date->formatLocalized(' jS \\of F Y ');
        
        $dates = Designacion::view_certification($id);
        $startdate = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->start_date));
        $enddate = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->end_date));
        $designate_date = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->designation_date));
        //$sd = $dates->start_date;
        //$date = $carbon->now($sd);
        $dat = $startdate->formatLocalized(' %d de %B del %Y');
        $dat1 = $enddate->formatLocalized(' %d de %B del %Y');
        $dat2 = $designate_date->formatLocalized(' %d de %B del %Y');
        //return $sd->formatLocalized(' %d de %B del %Y');
        if($dates->type == 1){
            return \PDF::loadView('reports.vista-pdf',compact('dates','dat','dat1','dat2'))->setPaper('letter', 'portrait')->stream('certification_student.pdf');
        }else{
            return \PDF::loadView('reports.vista-pdf_institute',compact('dates','dat','dat1','dat2'))->setPaper('letter', 'portrait')->stream('certification_student.pdf');
        }
        
        
    }
    public function report_memorandum($id){
        setlocale(LC_ALL, 'es_ES');
        $pdf = app('dompdf.wrapper');
        $dates = Designacion::view_certification($id);
        $designate_date = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->designation_date));
        $dat2 = $designate_date->formatLocalized(' %d de %B del %Y');
        return \PDF::loadView('reports.memorandum',compact('dates','dat2'))->setPaper('letter', 'portrait')->stream('memorandum_student.pdf');
        
    }
    //Function for Initation designate for studens
    public function start_designate(Request $request){
        //datos estudiante
        $student = Designacion::student_view($request->id);
        $students = Designacion::student_view_c_f_u($request->id);
        $quotas = Designacion::student_view_quotas($student->level_ac);
        return view('designations.internship_draw.create',compact('student','quotas','students'))->with('message','');
    }
    //funcion para sorteo de internados para universitarios
    public function quota_draw(Request $request){  
        $student_dates = Designacion::view_designation_student_dates($request->id_student);      
        $student1 =  Student::find($request->id_student);
        try {
            $numero = Designacion::quota_select_one($student1->level_ac,$request->periodo);
            $internship_save =  Quotas::find($numero->id);
            $internship_save->designation_date = date("Y-m-d H:i:s");
            $internship_save->id_student = $request->get('id_student');
            $internship_save->status_designation = 1;
            $internship_save->user_edit = \Auth::user()->id;
            $internship_save->update();
            $student = Designacion::view_designation_student($request->id_student);
            return view('designations.internship_draw.view_details_quotas_students',compact('numero','student','student_dates'));
        } catch (\Throwable $th) {
            $student = Designacion::student_view($request->id_student);
            $quotas = Designacion::student_view_quotas($student->level_ac);
            return view('designations.internship_draw.create',compact('student','quotas'))
                    ->with('message','No existe Cupos Disponibles')->with('type-alert','danger');
        }     
		
    }
    public function start_designation(Request $request){
        return view('designations.designation.start');
    }
    public function start_student_univesity(){
        $list_students = Designacion::internship_draw_list();
        $tipos_internado = \DB::table('internation_types')->where('internation_types.level_ac','=',1)->get();
        $gestion = Gestion::get();
        $periodo = Periods::get();
        return view('designations.designation.form_university_students',compact('tipos_internado','gestion','periodo'));
        //return view('designations.internship_draw.index',compact('list_students'));
    }
    public function search_students_uni_(Request $request){
        $request->validate([
            'tipo_internado' => 'numeric',
            'gestion' => 'numeric',
            'periodo' => 'numeric',
        ],[
            'tipo_internado.numeric' => 'Debe Seleccionar una Tipo',
            'gestion.numeric' => 'Debe Seleccionar una Gestion',
            'periodo.numeric' => 'Debe Seleccionar un Periodo',
        ]);
        $lista = Designacion::list_students($request->tipo_internado, $request->gestion, $request->periodo);
    }
    public function start_student_institute(){
        $list_students = Designacion::internship_draw_list_insti();
        return view('designations.designation.form_institute_students',compact('list_students'));
    }
    public function start_designation_insti(Request $request){
        //return $request->all();
        $student = Designacion::student_view_insti($request->id);
        //$quotas = Designacion::student_view_quotas_insti($stusdent->level_ac);
        return view('designations.internship_draw.create_isnti',compact('student','quotas'));
    }
    public function quota_draw_insti(Request $request){
        $student_dates = Designacion::view_designation_student_dates_insti($request->id_student);      
        $student1 =  Student::find($request->id_student);        
        $numero = Designacion::quota_select_one_insti($student1->level_ac,$request->periodo);
        $internship_save =  Quotas::find($numero->id);
        $internship_save->designation_date = date("Y-m-d H:i:s");
		$internship_save->id_student = $request->get('id_student');
        $internship_save->status_designation = 1;
        $internship_save->user_edit = \Auth::user()->id;
        $internship_save->update();
        $student = Designacion::view_designation_student($request->id_student);
		return view('designations.internship_draw.view_details_quotas_students_insti',compact('numero','student','student_dates'))
            ->with('info', 'Se registro Correctamente...');
    }

    //reportes en excel y pdf
    public function export_designations_excel(){
        return Excel::download(new DesignationsExport, 'lista_designaciones.xlsx');
    }
    public function generate_types_internships_pdf(){
        setlocale(LC_ALL, 'es_ES');
        $pdf = app('dompdf.wrapper');
        $internships = InternshipTipes::view_internships_types();
        //$designate_date = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->designation_date));
        //$dat2 = $designate_date->formatLocalized(' %d de %B del %Y');
        return \PDF::loadView('reports.internships',compact('internships'))->setPaper('letter', 'portrait')->stream('Estudantes Registrados.pdf');
    }

    public function index_gestion(){
        $gestion = Gestion::get();
        return view('designations.gestion.index',compact('gestion'));
    }
    public function index_periodos(){
        $periodos = Periods::get();
        return view('designations.period.index',compact('periodos'));
    }
    public function index_enable_periods(){
        $periodos_enabled = \DB::table('enable_periods')
            ->join('gestion','gestion.id','=','enable_periods.id_gestion')
            ->join('periods','periods.id','=','enable_periods.id_period')
            ->get([
                'enable_periods.id','enable_periods.date_start','enable_periods.date_end','enable_periods.status_',
                'gestion.gestion',
                'periods.period',
            ]);
        return view('designations.dates_enabled.index',compact('periodos_enabled'));
    }
    public function create_enable_periods(){
        $gestion = Gestion::get();
        $periodos = Periods::get();
        return view('designations.dates_enabled.create',compact('gestion','periodos'));
    }
    public function store_date_enabled(Request $request){
        $status = 'success';
        $conent = 'Se habilito el Registro de Estudiantes desde '. $request->fecha_inicio.' a '.$request->fecha_fin.' Correctamente';
        $request->validate([
            'id_gestion' => 'numeric',
            'id_periodo' => 'numeric',
            'fecha_fin' => 'date|required',
            'fecha_inicio' => 'date|required',
        ],[
            'id_gestion.numeric' => 'Debe Seleccionar una Gestion',
            'id_periodo.numeric' => 'Debe Seleccionar un Periodo',
            'fecha_fin.date' => 'El formato de Fecha Fin es Incorrecto',
            'fecha_inicio.date' => 'El formato de Fecha Inicio es Incorrecto',
        ]);
        $date_enabled = new Enable_periods();
        $date_enabled->date_end = request ('fecha_fin');
        $date_enabled->date_start = request ('fecha_inicio');
        $date_enabled->id_gestion = request ('id_gestion');
        $date_enabled->id_period = request ('id_periodo');
        $date_enabled->status_ = 1;
        $date_enabled->user_create = \Auth::user()->id;
        $date_enabled->user_edit = \Auth::user()->id;
        $date_enabled->save();
        $periodos_enabled = \DB::table('enable_periods')
            ->join('gestion','gestion.id','=','enable_periods.id_gestion')
            ->join('periods','periods.id','=','enable_periods.id_period')
            ->get([
                'enable_periods.id','enable_periods.date_start','enable_periods.date_end','enable_periods.status_',
                'gestion.gestion',
                'periods.period',
            ]);
        return view('designations.dates_enabled.index',compact('periodos_enabled'))
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
    }
    public function delete_date_enabled(Request $request){
        $status = 'success';
        $conent = 'La fecha se elimino correctamente';
        $exist = \DB::table('student')->where('student.id_date_enabled','=',$request->id)->get();
        $count = count($exist);
        if($count > 0){
            $status = 'error';
            $conent = 'La fecha seleccionada no se puede Eliminar, ya existen estudiantes registrados';
            return redirect()->route('index_enable_periods')
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
        }else{ 
            $delete = Enable_periods::find($request->id)->delete();           
            return redirect()->route('index_enable_periods')
            ->with('info', [
                'status' => $status,
                'content' => $conent
            ]);
        }
    }
    public function edit_date_enabled(Request $request){
        $dates = \DB::table('enable_periods')
        ->join('gestion','gestion.id','=','enable_periods.id_gestion')
        ->join('periods','periods.id','=','enable_periods.id_period')
        ->where('enable_periods.id','=',$request->id)->get([
            'enable_periods.id','enable_periods.date_start','enable_periods.date_end','enable_periods.id_gestion','enable_periods.id_period',
            'gestion.gestion',
            'periods.period'
            ])->first();
        return view('designations.dates_enabled.edit',compact('dates'));
    }
    public function update_date_enabled(Request $request){
        $status = 'success';
        $conent = 'La fechas se actualizaron correctamente';
        $date_enabled =  Enable_periods::find($request->id_date_enabled);
        $date_enabled->date_start = $request->get('fecha_inicio');
        $date_enabled->date_end = $request->get('fecha_fin');
        $date_enabled->user_edit = \Auth::user()->id;
        $date_enabled->update();
        return redirect()->route('index_enable_periods')
        ->with('info', [
            'status' => $status,
            'content' => $conent
        ]);
    }
}
