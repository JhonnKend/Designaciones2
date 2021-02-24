@component('components.create_card')
    @slot('title')
		Registro Nuevo Centro Medico
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_medicalCenter') }}" method="POST" class="save_date">  
        @csrf
        <div class="row">    
            <div class="col-md-12">                
                <div class="card card-success card-outline">                    
                    <div class="card-body">                 
                        <label class="card-title"><i class="fas fa-map-marker-alt"></i> DATOS UBICACION</label> <br>           
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option>Seleccione Departamento</option>
                                        @forelse($departments as $d)
                                            <option  value="{{ $d->id }}">{{ $d->name_department }}</option>
                                        @empty
                                        <   option value="">No hay Departamentos Registrados</option>
                                        @endforelse
                                    </select>
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                        <option value="">No hay Provincias</option>
                                    </select>
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                                                
                                    <select name="id_municipality" id="municipalities" class="change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                        <option value="">No hay Municipios</option>
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
                        <label class="card-title"><i class="fas fa-digital-tachograph"></i> DATOS GENERALES</label> <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="change_select form-control name_form" name="name_estable_salud" placeholder="Ingrese Nombre del Centro Medico">
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <input type="text" class="change_select form-control name_form" name="cod_estable_salud" placeholder="Ingrese Codigo del Centro Medico">
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <select name="subsector" id="" class="change_select form-control select2bs4 select2-danger name_form">
                                        <option value="">Seleccion Subsector</option>
                                        @forelse($subse as $a)
                                        <option value="{{ $a->id }}">{{ $a->name_subsector }}</option>
                                        @empty                                                
                                        @endforelse
                                    </select>
                                    <small class="text-red" id=""></small>
                                </div>
                            </div>
                        </div>
                        <div class="row margin_up">
                            <div class="col-md-4">
                                <div class="form-group"> 
                                    <select name="nivel_atencion" id="" class="change_select form-control select2bs4 select2-danger name_form">
                                        <option value="">Seleccion Nivel de Atencion</option>    
                                        @forelse($at_le as $al)
                                            <option value="{{ $al->id }}">{{ $al->name_level }}</option>    
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
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            @foreach($dates_medical_center->chunk(2) as $chunk)  
                                                <tr>
                                                @foreach($chunk as $r)
                                                
                                                    <td>
                                                        {{ $r->name }}
                                                    </td>                      
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="change_select name_form custom-control-input" type="checkbox" id="customCheckbox{{ $r->id }}" name="character[]" value="{{ $r->id }}">
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