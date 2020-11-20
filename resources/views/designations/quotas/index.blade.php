@component('components.index_card')
    @slot('title')
        Lista de Cupos Registrados
    @endslot    
    @slot('bodycard')
    <form action="{{ route('cargar_lsita_centros_medicos_cupos') }}" method="POST" class="load_medical_centers">
        @csrf  
        <div class="row">            
            <div class="col-md-3">
                <div class="form-group">
                    <select name="gestion" id="gestion" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione una Gestion</option>
                        @foreach($gestion as $g)
                            <option value="{{$g->id}}">{{$g->gestion}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="periodo" id="periodo" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione un Periodo</option>
                        @foreach($periodo as $p)
                            <option value="{{$p->id}}">{{$p->period}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="tipo" id="tipo" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="0">Todos</option>
                        <option value="1">Con Cupos</option>
                        <option value="2">Sin Cupos</option>                        
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-search"></i> Cargar Datos</button>
            </div>
        </div>
    </form> <br>
    <div class="row" style="font-size: 12px">
        <div class="col-md-12">
            <div class="table-responsive">
                    <table id="load_table_list" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">CODIGO</th>
                                <th scope="col">ESTABLECIMIENTO</th>
                                <th scope="col">MUNICIPIO</th>
                                @foreach ($tipos_internado as $item)
                                <th scope="col">{{ strtoupper($item->name_type) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endslot
        @slot('action')
            @can('acceso_reportes')
                <a href="{{ route('export_quotas_excel') }}" class="btn btn-sm btn-outline-success "> <i class="far fa-file-excel"></i> Generar EXCEL</a> 
                <a href="{{ route('generate_quotas_pdf') }}" class="btn btn-sm btn-outline-danger "> <i class="far fa-file-pdf"></i> Generar PDF</a>                 
            @endcan
            @can('create_quotas')
                <a href="{{ route('create_quotas') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Registrar Cupos</a> 
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