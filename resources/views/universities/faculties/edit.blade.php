@component('components.edit_card')
    @slot('title')
		Editar datos Facultad
    @endslot    
	@slot('bodycard')
        <form action="{{ route('update_faculties', $faculty_edit[0]->id_fa) }}" method="POST" class="save_date">  
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
                                            @if($faculty_edit[0]->id_department === $d->id)
                                            <p>{{ $faculty_edit[0]->id_department }} {{ $d->id}}</p>             
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
                                            @if($faculty_edit[0]->id_province === $d->id)
                                            <p>{{ $faculty_edit[0]->id_department }} {{ $d->id}}</p>             
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
                                            @if($faculty_edit[0]->id_municipality === $d->id)            
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
                                            @if($faculty_edit[0]->id_municipality === $d->id)            
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
                                    <label for="">Nombre Facultad</label>
                                    <input value="{{ $faculty_edit[0]->name_faculty }}" type="text" class="change_select form-control name_form" name="name_faculty" placeholder="Ingrese Nombre la facultad">
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="description" id="" placeholder="Ingrese una descripcion">{{ $faculty_edit[0]->description }}</textarea>
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
        </form>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_faculties') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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