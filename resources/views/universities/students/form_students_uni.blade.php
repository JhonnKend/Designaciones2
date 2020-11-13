@component('components.create_card')
@slot('title')
    Registro  Nuevo Estudiante
@endslot    
@slot('bodycard')
<form action="{{ route('store_students_uni') }}" method="POST" class="save_date">  
@csrf  
<input type="hidden" name="type_uni_inst" value="universidad">
<div class="text-center">
    <h6 class="card-title text-success"></i> DATOS GENERALES DEL ESTUDIANTE</h6> <hr>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name_student">NOMBRES</label>
            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="a_paterno">APELLIDO PATERNO</label>
            <input type="text" class="change_select form-control name_form" name="a_paterno" placeholder="Ingrese Apellido Paterno">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="a_materno">APELLIDO MATERNO</label>
            <input type="text" class="change_select form-control name_form" name="a_materno" placeholder="Ingrese Apellido Materno">
            <small class="text-danger" id=""></small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="ci">CARNET DE IDENTIDAD</label>
            <input type="text" class="form-control name_form" name="ci" placeholder="Ej. 12404567">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
        <label for="exp">EXP</label>
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
            <input type="date" class="form-control name_form" name="birth_date">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
        <label for="genero">SEXO</label>
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
            <input type="numeric" class="change_select form-control name_form" name="phone" placeholder="Ejm. 60242367">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="addrees">DIRECCION</label>
            <input type="text" class="change_select form-control name_form" name="addrees" placeholder="Ingrese su Direccion">
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label for="email">CORREO</label>
            <input type="email" class="form-control name_form" name="email" placeholder="ejemplo@gmail.com">
            <small class="text-danger" id=""></small>
        </div>
    </div>
</div>
<div class="text-center">
    <h6 class="card-title text-success"></i> DATOS LUGAR DE ESTUDIO</h6> <hr>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">       
            <label for="">UNIVERSIDAD</label>                                         
            <select name="id_university" id="university" class="charge_faculties change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
            <option value="{{ $my_uni->id }}">{{ $my_uni->name_university }}</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>  
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">FACULTAD</label>
            <select name="id_faculty" id="" class="load_career_faculties option_default delete_fa change_select form-control select2bs4 select2-danger name_form">
                <option value="">Seleccione una Opcion</option>
                @foreach($my_faculties as $m)
                    <option value="{{$m->id_faculty}}"> {{ $m->name_faculty }}</option>
                @endforeach
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">CARRERA</label>
            <select name="id_career" id="select_careers" class="change_select form-control select2bs4 select2-danger name_form">
                <option value="">No hay Carreras</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>
<button type="reset" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</button>
</form>
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>
@endslot
@slot('action')
    @can('index_universities')
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