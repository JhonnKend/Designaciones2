@component('components.index_card')
@slot('title')
    Registro  Nueva Carrera
@endslot    
@slot('bodycard')
    <form action="{{ route('store_my_careers') }}" method="POST" class="save_date">  
        @csrf 
            <div class="col-sm-12">                
                <div class="card card-success card-outline">
                    <div class="card-body">                            
                        <label class="card-title"><i class="fas fa-map-marker-alt"></i> DATOS UBICACION UNIVERSIDAD</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">DEPARTAMENTO</label>
                                    <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                                            <option> {{ $perfil_university->name_department }} </option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">PROVINCIA</label>
                                    <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                                        <option> {{ $perfil_university->name_province }} </option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">       
                                    <label for="">MUNICIPIO</label>
                                    <select name="id_municipality" id="municipalities" class="charge_university change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                                        <option> {{ $perfil_university->name_municipality }} </option>
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
                                    <label for="">UNIVERSIDAD</label>                                         
                                    <select name="id_university" id="university" class="charge_faculties change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                                        <option> {{ $perfil_university->name_university }} </option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">FACULTAD</label>
                                    <select name="id_faculty" id="id_faculties" class="option_default delete_fa change_select form-control select2bs4 select2-danger name_form">
                                        @foreach($faculties as $r)
                                            <option value="{{ $r->id }}"> {{ $r->name_faculty }} </option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_cereer">NOMBRE CARRERA</label>
                                    <input type="text" class="change_select form-control name_form" name="name_career" placeholder="Ingrese Nombre la Carrera">
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_cereer">TIPO INTERNADO</label>
                                    <select name="type_in" id="type_in" class="change_select form-control select2bs4 select2-danger name_form">
                                        <option value="">Seleccione un tipo de Internado</option>
                                        @foreach ($types_internations as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name_type }}</option>
                                        @endforeach                                        
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">DESCRIPCION</label>
                                    <textarea class="form-control" name="description" id="" placeholder="Ingrese una descripcion"></textarea>
                                </div>
                            </div>
                            <div class="p-4">
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
    @can('index_careers')
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