@component('components.edit_card')
    @slot('title')
		Editar datos Carrera
    @endslot    
	@slot('bodycard')
        <form action="{{ route('update_careers', $career_edit[0]->id) }}" method="POST" class="save_date">  
            @csrf
                <div class="col-sm-12">                    
                    <div class="card card-success card-outline">
                        <div class="card-body">                            
                            <label class="card-title"><i class="fas fa-map-marker-alt"></i> DATOS UBICACION UNIVERSIDAD</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id_departament">Departamento</label>
                                        <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option>Seleccione Departamento</option>
                                            @forelse($departments as $d)
                                                @if($career_edit[0]->id_department === $d->id)
                                                <p>{{ $career_edit[0]->id_department }} {{ $d->id}}</p>             
                                                <option selected value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_department }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id_province">Provincia</label>
                                        <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                            @forelse($province as $d)
                                                @if($career_edit[0]->id_province === $d->id)
                                                <p>{{ $career_edit[0]->id_department }} {{ $d->id}}</p>             
                                                <option selected value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_province }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">   
                                        <label for="id_municipality">Municipio</label>                                             
                                        <select name="id_municipality" id="municipalities" class="charge_university change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                            @forelse($municipalities as $d)
                                                @if($career_edit[0]->id_municipality === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">                    
                    <div class="card card-success card-outline"> 
                        <div class="card-body">
                            <label class="card-title"><i class="fas fa-digital-tachograph"></i> DATOS GENERALES</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">    
                                        <label for="id_university">Universidad</label>                                            
                                        <select name="id_university" id="university" class="change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                            @forelse($universities as $d)
                                                @if($career_edit[0]->id_municipality === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_university }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_university }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">    
                                        <label for="id_university">Facultad</label>                                            
                                        <select name="id_faculty" id="faculty" class="change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                            @forelse($faculties as $d)
                                                @if($career_edit[0]->id_fa === $d->id)            
                                                <option selected value="{{ $d->id }}">{{ $d->name_faculty }}</option>
                                                @else
                                                <option value="{{ $d->id }}">{{ $d->name_faculty }}</option>
                                                @endif
                                            @empty
                                                <option value="">No hay Departamentos Registrados</option>
                                            @endforelse  
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>                                        
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre Carrera</label>
                                        <input value="{{ $career_edit[0]->name_career }}" type="text" class="change_select form-control name_form" name="name_career" placeholder="Ingrese Nombre la facultad">
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_cereer">TIPO INTERNADO</label>
                                        <select name="type_in" id="type_in" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option value="">Seleccione un tipo de Internado</option>
                                            @foreach ($types_internations as $item)
                                                @if($career_edit[0]->type_internation === $item->id) 
                                                    <option selected value="{{ $item->id }}"> {{ $item->name_type }}</option>
                                                @else
                                                    <option value="{{ $item->id }}"> {{ $item->name_type }}</option>
                                                @endif
                                            @endforeach                                        
                                        </select>
                                        <small class="text-danger" id=""></small>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea class="form-control" name="description" id="" placeholder="Ingrese una descripcion">{{ $career_edit[0]->description }}</textarea>
                                    </div>
                                </div>
                            </div> 
                            <div class="p-2">
                                <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>
                                <button type="reset" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</button>
                            </div>
                        </div>    
                    </div>
                </div>      
            </div>            
        </form>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_careers') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })    
})
</script>