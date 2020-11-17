@component('components.create_card')
@slot('title')
    Registro Nuevo Cupo para Designacion
@endslot    
@slot('bodycard')    
    <form action="{{ route('store_quotas') }}" method="POST" class="save_date">  
        @csrf  
        <div class="row">
            <div class="col-md-12">
                <h6 class="card-title text-success text-center"></i> DATOS CENTRO MEDICO</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">DEPARTAMENTO</label>
                    <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                            <option>Seleccione Departamento</option>
                        @forelse($departments as $d)
                            <option  value="{{ $d->id }}">{{ $d->name_department }}</option>
                        @empty
                            <option value="">No hay Departamentos Registrados</option>
                        @endforelse
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">PROVINCIA</label>
                    <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                        <option value="">No hay Provincias</option>
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">      
                    <label for="">MUNICIPIO</label>
                    <select name="id_municipality" id="municipalities" class="load_medical_center_qoutas change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                        <option value="">No hay Municipios</option>
                    </select>
                    <small class="text-danger" id=""></small>
                </div>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">      
                    <label for="">CENTRO MEDICO</label>
                    <select name="id_medical_center" id="medical_center" class="change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                        <option value="">No hay Centros Medicos</option>
                    </select>
                    <small class="text-danger" id=""></small>
                </div>   
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">TIPO INTERNADO</label>
                    <select name="tipe_internado" id="" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione un tipo de internado</option>
                        @forelse($tipes_quotas as $d)
                            <option value="{{ $d->id }}">{{ $d->name_type }}</option>
                        @empty
                            <option value="">No hay Tipos</option>
                        @endforelse                    
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">CANTIDAD DE CUPOS</label>
                        <input type="number" name="quantity_qoutas" class="change_select form-control name_form" min="0">
                    <small class="text-danger" id=""></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="date">GESTION</label>
                <select name="gestion" id="gestion" class="change_select form-control select2bs4 select2-danger name_form">
                    <option value="">Seleccione una Gestion</option>
                    @foreach($gestion as $g)
                        <option value="{{ $g->id }}">{{$g->gestion}}</option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>
            <div class="col-md-4">
                <label for="date">PERIODO</label>
                    <select name="periodo" id="periodo" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione un Periodo</option>
                        @foreach($periodos as $p)
                            <option value="{{$p->id}}">{{$p->period}}</option>
                        @endforeach
                    </select>
                <small class="text-danger" id=""></small>
            </div>            
        </div> <br>
        <div class="row">
            <div class="col-md-4">
                <label for="date">FECHA INICIO</label>
                    <input type="date" class="form-control name_form change_select" name="start_date">
                <small class="text-danger" id=""></small>
            </div>
            <div class="col-md-4">
                <label for="date">FECHA FIN</label>
                    <input type="date" class="form-control name_form change_select" name="end_date">
                <small class="text-danger" id=""></small>
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
    @can('index_quotas')
        <button href="{{ route('index_quotas') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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
$('.select2bs4').select2({
    theme: 'bootstrap4'
})
})
</script>