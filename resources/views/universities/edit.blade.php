@component('components.edit_card')
    @slot('title')
		Editar datos Universidad
    @endslot    
	@slot('bodycard')
        <form action="{{ route('update_universities', $univercity_edit[0]->id ) }}" method="POST" class="save_date">  
            <div class="row">    
                <div class="col-sm-12">                    
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <label class="card-title"><i class="fas fa-map-marker-alt"></i> DATOS UBICACION</label>
                            <div class="row">
                                <div class="col-md-4">
                                    @csrf
                                    <div class="form-group">
                                        <label for="department">Departamento</label>
                                        <select name="department" id="department_prov" class="change_select name_form form-control select2bs4 select2-danger">
                                        @forelse($departments as $d)
                                            @if($univercity_edit[0]->id_department === $d->id)
                                            <p>{{ $univercity_edit[0]->id_department }} {{ $d->id}}</p>             
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
                                        <select name="id_province" id="provinces" class="change_select name_form form-control select2bs4 select2-danger clear_options">
                                        @forelse($province as $d)
                                            @if($univercity_edit[0]->id_province === $d->id)
                                            <p>{{ $univercity_edit[0]->id_department }} {{ $d->id}}</p>             
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
                                        <select name="id_municipality" id="municipalities" class="change_select name_form clear_options_prov form-control select2bs4 select2-danger clear_options">
                                        @forelse($municipalities as $d)
                                            @if($univercity_edit[0]->id_municipality === $d->id)            
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
                                        <label for="nombre">Nombre Universidad</label>
                                        <input type="text" class="change_select form-control name_form" value="{{ $univercity_edit[0]->name_university }}" name="name_university" placeholder="Ingrese Nombre del Centro Medico">
                                        <small class="text-red" id=""></small>
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
			<button href="{{ route('index_universities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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
