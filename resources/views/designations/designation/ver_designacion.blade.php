@component('components.create_card')
@slot('title')
    EDITAR DESIGNACION DE ESTUDIANTE
@endslot    
@slot('bodycard')
<form action="{{ route('guardar_nueva_designacion') }}" method="POST" class="save_date"> 
    @csrf
    <input type="hidden" value={{ $datos_enviar }} name="datos_enviar" id="datos_enviar">
    <input type="hidden" value={{ $centro_salud->id_cupo }} name="id_cupo" id="id_cupo">    
    <h6 class="card-title text-success"> DATOS DEL ESTUDIANTE</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nombres y Apellidos</label>
                <input class="form-control" type="text" value="{{$datos_estudiante->name}} {{$datos_estudiante->ap_pat}} {{$datos_estudiante->ap_mat}}" disabled>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Cedula de Identidad</label>
                <input class="form-control" type="text" value="{{$datos_estudiante->ci}} {{$datos_estudiante->exp}}" disabled>
            </div>
        </div>
    </div>
    <h6 class="card-title text-success"> DATOS DE ESTUDIO</h6>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Universidad</label>
                <input class="form-control" type="text" value="{{$lugar_estudio->name_university}}" disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Facultad</label>
                <input class="form-control" type="text" value="{{$lugar_estudio->name_faculty}}" disabled>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Carrera</label>
                <input class="form-control" type="text" value="{{$lugar_estudio->name_career}}" disabled>
            </div>
        </div>
    </div>
    <div class="editar_vista">
        <h6 class="card-title text-success"> DATOS DE LA DESIGNACION</h6>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Departamento</label>
                    <input class="form-control" type="text" value="{{$centro_salud->name_department}}" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Provincia</label>
                    <input class="form-control" type="text" value="{{$centro_salud->name_province}}" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Municipio</label>
                    <input class="form-control" type="text" value="{{$centro_salud->name_municipality}}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Centro de Salud</label>
                    <input class="form-control" type="text" value="{{$centro_salud->name_estable_salud}}" disabled>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">               
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-success btn-sm" target="_blank" href="{{ route('report_certification',$datos_estudiante->id) }}"> <span class="fas fa-print"></span> Certificacion</a>
            <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('report_memorandum',$datos_estudiante->id) }}"> <span class="fas fa-print"></span> Memorandum</a>
        </div>
    </div>
</form>
@endslot
@slot('action')
    @can('index_enable_periods')
        <!--button href="{{ route('index_enable_periods') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button-->
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
        $('.select_gestion').select2({
            theme: 'bootstrap4'
        })
    })
</script>