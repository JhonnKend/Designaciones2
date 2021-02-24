@component('components.edit_card')
    @slot('title')
		Editar datos del Centro Medico
    @endslot    
	@slot('bodycard')
        <form action="{{ route('update_medicalCenter', $medicalCenter[0]->id ) }}" method="POST" class="save_date">  
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
                                            @if($medicalCenter[0]->id_department === $d->id)
                                            <p>{{ $medicalCenter[0]->id_department }} {{ $d->id}}</p>             
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
                                            @if($medicalCenter[0]->id_province === $d->id)
                                            <p>{{ $medicalCenter[0]->id_department }} {{ $d->id}}</p>             
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
                                            @if($medicalCenter[0]->id_muni === $d->id)            
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
            </div>
            <div class="row">  
                <div class="col-sm-12">                    
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <label class="card-title"><i class="fas fa-digital-tachograph"></i> DATOS GENERALES</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">    
                                        <label for="name_estable_salud">Nombre Centro Medico</label>                            
                                        <input type="text" class="form-control name_form" value="{{ $medicalCenter[0]->name_estable_salud }}" name="name_estable_salud" placeholder="Ingrese Nombre del Centro Medico">
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">  
                                        <label for="cod_estable_salud">Codigo Centro Medico</label>                                           
                                        <input type="text" class="form-control name_form" value="{{ $medicalCenter[0]->cod_estable_salud }}" name="cod_estable_salud" placeholder="Ingrese Codigo del Centro Medico">
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">    
                                        <label for="subsector">Subsector</label>                                     
                                        <select name="subsector" id="" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option value="">Seleccion Subsector</option>
                                            @forelse($subse as $a)
                                                @if($medicalCenter[0]->subsector == $a->id)
                                                    <option selected value="{{ $a->id }}">{{ $a->name_subsector }}</option>
                                                @else
                                                    <option value="{{ $a->id }}">{{ $a->name_subsector }}</option>
                                                @endif
                                            @empty                                                
                                            @endforelse
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <label for="nivel_atencion">Nivel de Atencion</label>  
                                        <select name="nivel_atencion" id="" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option value="">Seleccion Nivel de Atencion</option>
                                            @forelse($at_le as $a)
                                                @if($medicalCenter[0]->atention_nivel == $a->id)
                                                    <option selected value="{{ $a->id }}">{{ $a->name_level }}</option>
                                                @else
                                                    <option value="{{ $a->id }}">{{ $a->name_level }}</option>
                                                @endif                                                
                                            @empty                                                
                                            @endforelse
                                        </select>
                                        <small class="text-red" id=""></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title"> SELECCIONE LAS CARACTERISTICAS QUE CORRESPONDAN AL CENTRO MEDICO.<i class="far fa-hand-pointer mover" style="font-size: 30px;"></i> </label> 
                                        </div>
                                        <span class="text-red" id="error_character"></span>                                         
                                        <div class="card-body">                                            
                                            <table class="table">
                                                <tbody>
                                                    @foreach($date_medical_center->chunk(2) as $chunk)                                                            
                                                        <tr>
                                                            @foreach($chunk as $r)
                                                                <td>
                                                                    {{ $r->name }}
                                                                </td>                                                                    
                                                                <td> 
                                                                    <?php $a = False ?>
                                                                    @foreach($dates_me_c_regis as $ra)   
                                                                        @if($ra->id_date_medical_center == $r->id)
                                                                        <?php $a = True ?>
                                                                        @else
                                                                        @endif
                                                                    @endforeach
                                                                    <div class="custom-control custom-checkbox">     
                                                                            <input {{ $a == True ? "checked" : "" }} class="change_select custom-control-input name_form" type="checkbox" id="customCheckbox{{ $r->id }}" name="character[]" value="{{ $r->id }}">                                                                            
                                                                            
                                                                        <label for="customCheckbox{{ $r->id }}" class="custom-control-label"></label>                                                                            
                                                                    </div>                                                                        
                                                                </td>                                                                    
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="row">
                <div class="p-2">
                    <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>
                    <button type="reset" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</button>
                </div>
            </div>
        </form>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_medicalCenter') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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