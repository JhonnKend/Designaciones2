@component('components.create_card')
@slot('title')
    Editar fechas de Periodo de Registro de Estudiantes
@endslot    
@slot('bodycard')
<form action="{{ route('update_date_enabled') }}" method="POST" class="save_date"> 
    <input type="hidden" value="{{ $dates->id }}" name="id_date_enabled"> 
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cod_depa">GESTION</label>
                <input class="form-control" type="text" placeholder="" value="{{$dates->gestion}}" id="exampleFormControlReadonly" readonly="">
                <small class="text-danger" id=""></small>
            </div>
            <div class="form-group">
                <label for="">FECHA INICIO</label>                
                <input type="date" name="fecha_inicio" class="form-control name_form change_select"  value="{{ date('Y-m-d', strtotime($dates->date_start)) }}">
                <small class="text-danger" id=""></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cod_depa">PERIODO</label>
                    <input class="form-control" type="text" placeholder="" value="{{$dates->period}}" id="exampleFormControlReadonly" readonly="">
                <small class="text-danger" id=""></small>
            </div>
            <div class="form-group">
                <label for="">FECHA FIN</label>                
                <input type="date" name="fecha_fin" class="form-control name_form change_select" value="{{ date('Y-m-d', strtotime($dates->date_end)) }}">
                <small class="text-danger" id=""></small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Ingrese una Observación"></textarea>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>
            <button type="reset" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</button>
        </div>
    </div>
</form>
@endslot
@slot('action')
    @can('tecnico_sedes')
        <button href="{{ route('index_enable_periods') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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