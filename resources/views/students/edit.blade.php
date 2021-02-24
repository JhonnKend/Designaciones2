@component('components.edit_card')
    @slot('title')
		Editar datos de Estudiante
    @endslot    
	@slot('bodycard')
    <form  action="{{ route('update_students', $student->id ) }}" method="POST" class="save_date"> 
		@csrf  
		<div class="row">
			<div class="col-md-12">						
				<div class="card card-success card-outline">
					<div class="card-body">
						<div class="text-center">
							<h6 class="card-title text-success"></i> DATOS GENERALES DEL ESTUDIANTE</h6> <hr>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name_student">NOMBRES</label>
									<input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="{{ $student->name }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="a_paterno">APELLIDO PATERNO</label>
									<input type="text" class="change_select form-control name_form" name="a_paterno" placeholder="Ingrese Apellido Paterno" value="{{ $student->ap_pat }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="a_materno">APELLIDO MATERNO</label>
									<input type="text" class="change_select form-control name_form" name="a_materno" placeholder="Ingrese Apellido Materno" value="{{ $student->ap_mat }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="ci">CARNET DE IDENTIDAD</label>
									<input type="text" class="form-control name_form" name="ci" placeholder="Ej. 12404567" value="{{ $student->ci }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
                                <label for="exp">EXP</label>
                                    <!-- Agregar datos de Expedido en la base de datos para que sea dinamico -->
									<select class="custom-select" name="exp">                                    
										<option>Pt</option>
										<option>Lp</option>
										<option>Tj</option>
										<option>Sc</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="date">FECHA DE NACIMIENTO</label>
									<input type="date" class="form-control name_form" name="birth_date" value="{{ $student->birth_date }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
                                <label for="genero">GENERO</label>
                                <!-- Agregar datos de Genero en la base de datos para que sea dinamico -->
								<select class="custom-select" name="genero" >
									<option>MASCULINO</option>
									<option>FEMENINO</option>
								</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="phone">TELEFONO</label>
									<input type="numeric" class="change_select form-control name_form" name="phone" placeholder="Ejm. 60242367" value="{{ $student->celular }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="addrees">DIRECCION</label>
									<input type="text" class="change_select form-control name_form" name="addrees" placeholder="Ingrese su Direccion" value="{{ $student->direccion }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="email">CORREO</label>
									<input type="email" class="form-control name_form" name="email" placeholder="ejemplo@gmail.com" value="{{ $student->correo }}">
									<small class="text-danger" id=""></small>
								</div>
							</div>
						</div>
					</div>
				</div>						
				<div class="card card-success card-outline">
					<div class="card-header">
						<div class="text-center">
							<h6 class="card-title text-success"></i> DATOS CENTRO DE LA INSTITUCION EDUCATIVA</h6> <hr>
						</div>
						<div class="card-tools text-right">
							<button type="button" class="btn btn-outline-primary btn-sm load_uni_student">
								Universidad
							</button>
							<button type="button" class="btn btn-outline-success btn-sm load_inti_student">
								Insitutos
							</button>
						</div>
					</div>
					<div class="card-body">						
						<div id="load_uni_inti">
                            @if($student->type == 0)
                            <input type="hidden" name="type_uni_inst" value="instituto">
                            <div class="row">
                                <input type="hidden" name="type_uni_inst" value="instituto">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">DEPARTAMENTO</label>
                                        <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                                                <option>Seleccione Departamento</option>
                                                @forelse($departments as $d)
                                                    @if($uni->id_depart === $d->id)          
                                                        <option selected value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                    @else
                                                        <option value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                    @endif
                                                @empty
                                                    <option value="">No hay Departamentos Registrados</option>
                                                @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">PROVINCIA</label>
                                        <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                            @forelse($prov as $d)
                                                @if($uni->id_province === $d->id)           
                                                <option selected value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">      
                                        <label for="">MUNICIPIO</label> 
                                        <select name="id_municipality" id="municipalities" class="charge_career_insti change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                            @forelse($municipalities as $d)
                                                @if($uni->id_municipality === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Municipios Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">       
                                        <label for="">INSTITUTO</label>                                         
                                        <select name="id_institute" id="career_insti" class="charge_career_institutes change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                            @forelse($institutes as $i)
                                                @if($uni->id_institute === $i->id)
                                                    <option selected value="{{ $i->id }}">{{ $i->name_institute }}</option>
                                                @else
                                                <option value="{{ $i->id }}">{{ $i->name_institute }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Institutos Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">CARRERA</label>
                                        <select name="id_career" id="select_careers_insti" class="change_select form-control select2bs4 select2-danger name_form">
                                            @forelse($careers_insitutes as $i)
                                                @if($uni->id_career === $i->id)    
                                                    <option value="{{ $i->id }}" selected>{{ $i->name_career }}</option>
                                                @else
                                                    <option value="{{ $i->id }}">{{ $i->name_career }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Carreras</option>
                                            @endforelse                                                
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                            </div>
                            @else($student->insti_id === 1)
                            <input type="hidden" name="type_uni_inst" value="universidad">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">DEPARTAMENTO</label>
                                        <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                                                <option>Seleccione Departamento</option>
                                                @forelse($departments as $d)
                                                    @if($uni->id_depart === $d->id)          
                                                        <option selected value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                    @else
                                                        <option value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                    @endif
                                                @empty
                                                    <option value="">No hay Departamentos Registrados</option>
                                                @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">PROVINCIA</label>
                                        <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                            @forelse($prov as $d)
                                                @if($uni->id_province === $d->id)           
                                                <option selected value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">      
                                        <label for="">MUNICIPIO</label> 
                                        <select name="id_municipality" id="municipalities" class="charge_career_insti change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                            @forelse($municipalities as $d)
                                                @if($uni->id_municipality === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Municipios Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">       
                                        <label for="">UNIVERSIDAD</label>                                         
                                        <select name="id_university" id="university" class="charge_faculties change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                            @forelse($universities as $d)
                                                @if($uni->id_universidad === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_university }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_university }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Municipios Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">FACULTAD</label>
                                        <select name="id_faculty" id="id_faculties" class="load_career_faculties option_default delete_fa change_select form-control select2bs4 select2-danger name_form">
                                            @forelse($faculties as $d)
                                                @if($uni->id_faculty === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_faculty }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_faculty }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Municipios Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">CARRERA</label>
                                        <select name="id_career" id="select_careers" class="change_select form-control select2bs4 select2-danger name_form">
                                            @forelse($faculties_careers as $d)
                                                @if($uni->id_career === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_career }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_career }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Municipios Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>				
						<button type="reset" class="btn btn-danger">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	@endslot
	@slot('action')
		@can('tecnico_sedes')
			<button href="{{ route('index_students') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
@if( session()->has('info'))
<script>
$(function(){        
    toastr.options = {
    "closeButton": true,
    "progressBar": true,
    }
    toastr.{{ session('info')['status'] }}('{{ session("info")["content"] }}');
})
</script>
@endif
<script>    
    $(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4'
        })    
    })
</script>