@component('components.create_card')
@slot('title')
    Registro  Nuevo Estudiante
@endslot    
@slot('bodycard')
<form action="{{ route('store_students_uni') }}" method="POST" class="save_date">  
    @csrf  
    <input type="hidden" name="type_uni_inst" value="universidad"/>
    <div class="text-center">
        <h6 class="card-title text-success"></i> PERIODOS HABILITADOS PARA REGISTRO</h6> <hr>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <small class="text-danger" id="id_periodo"></small>
            <table id="example" class="table align-items-center table-flush">
                <thead>
                    <tr>
                        <th>GESTION</th>
                        <th>PERIDO</th>
                        <th>OPCION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($periodo_habilitados as $ph)
                        <tr>
                            <td> {{ $ph->gestion }} </td>
                            <td> {{ $ph->period }} </td>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio{{ $ph->id }}" name="id_periodo" value="{{ $ph->id }}" class="custom-control-input change_select">
                                    <label class="custom-control-label" for="customRadio{{ $ph->id }}"></label>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Existen fechas habilitadas para registro</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> <br>
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
    <div class="text-center">
        <h6 class="card-title text-success"></i> DATOS GENERALES DEL ESTUDIANTE</h6> <hr>
    </div>
    <div class="row">
        <select name="format" onchange="setfmt()">
            <option value="csv" selected=""> CSV</option>
            <option value="json"> JSON</option>
            <option value="form"> FORMULAE</option>
            <option value="html"> HTML</option>
            <option value="xlsx"> XLSX</option>
            </select>
        <div class="col-md-7">Use Web Workers: (when available) <input type="checkbox" name="useworker" checked/>
            Use readAsBinaryString: (when available) <input type="checkbox" name="userabs" checked/></div>
        <div class="col-md-5">
            <div class="form-control">
            <input type="file" name="xlfile" id="xlf"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary btn-block"> <i class="far fa-save"></i> Guardar</button>
        </div>
        <div class="col-md-3">
            <button type="reset" class="btn btn-danger btn-block"> <i class="fas fa-times"></i> Cancelar</button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <pre id="out"></pre>
            <div id="htmlout"></div>
        </div>
    </div>
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