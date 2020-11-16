@component('components.create_card')
@slot('title')
    Registro Nuevo Periodo de Registro de Estudiantes
@endslot    
@slot('bodycard')
<form action="{{ route('store_date_enabled') }}" method="POST" class="save_date">  
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cod_depa">GESTION</label>                
                <select name="id_gestion" id="" class="form-control select_gestion select2-danger name_form change_select">
                    <option value="">Seleccione Gestion</option>
                    @foreach($gestion as $g)
                        <option value="{{ $g->id }}"> {{ $g->gestion }} </option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>
            <div class="form-group">
                <label for="">FECHA INICIO</label>                
                <input type="date" name="fecha_inicio" class="form-control name_form change_select"  value="{{ date('Y-m-d', strtotime(now())) }}">
                <small class="text-danger" id=""></small>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cod_depa">PERIODO</label>                
                <select name="id_periodo" id="" class="form-control select_gestion select2-danger name_form change_select">
                    <option value="">Seleccione Periodo</option>
                    @foreach($periodos as $p)
                        <option value="{{$p->id}}">{{ $p->period }}</option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>
            <div class="form-group">
                <label for="">FECHA FIN</label>                
                <input type="date" name="fecha_fin" class="form-control name_form change_select">
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
    @can('index_enable_periods')
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