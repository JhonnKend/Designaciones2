@component('components.index_card')
@slot('title')
    Registro  Nueva Facultad
@endslot    
@slot('bodycard')
    <form action="{{ route('store_faculties') }}" method="POST" class="save_date">  
        @csrf 
            <div class="col-sm-12">                
                <div class="card card-success card-outline">
                    <div class="card-body">                            
                        <label class="card-title"><i class="fas fa-map-marker-alt"></i> DATOS UBICACION UNIVERSIDAD</label>
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
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                        <option value="">No hay Provincias</option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">                                                
                                    <select name="id_municipality" id="municipalities" class="charge_university change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                        <option value="">No hay Municipios</option>
                                    </select>
                                    <small class="text-danger" id=""></small>
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
                                    <select name="id_university" id="university" class="change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                        <option value="">No hay Universidades</option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="change_select form-control name_form" name="name_faculty" placeholder="Ingrese Nombre la facultad">
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="description" id="" placeholder="Ingrese una descripcion"></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
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