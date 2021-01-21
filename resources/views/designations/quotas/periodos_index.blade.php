@foreach($periodos_habilitados->chunk(4) as $chunk)
<div class="row">                                            
    @foreach($chunk as $add)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Periodo {{$add->period}}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success">Del</span>
                    <span>{{ $add->date_start }}</span>
                    <span class="text-success"> al</span>
                    <span>{{ $add->date_end }}</span><span class="mr-2"> </i><a type="button" class="btn btn-info mb-1 btn-sm"> <i class="fas far fa-edit"></i> </a></span>
                </div> <br>
                <div class="text-xs font-weight-bold text-uppercase mb-1">Registro de Estudiantes</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"></i> Fecha Inicio</span>
                    <span>{{ $add->date_start }}</span>
                </div>
                <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"></i> Fecha Limite</span>
                    <span>{{ $add->date_end }}</span>
                </div> <br>
            </div>
        </div>
    </div>
    @endforeach
</div> <br>
@endforeach
<div class="card-header">
    <h6 class="text-primary">
        <i class="fa fa-table"></i>
        Asignacion de Cupos</h6>
  </div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('cargar_lsita_centros_medicos_cupos') }}" method="POST" class="">
            <input type="hidden" name="gestion" id="gestion" value="{{$periodos_habilitados[0]->gestion}}">
            @csrf  
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select name="periodo" id="periodo" class="change_select form-control select2bs4 select2-danger name_form load_medical_centers">
                            <option value="">Seleccione un Periodo</option>
                            @foreach($periodos_habilitados as $p)
                                <option value="{{$p->id_periodo}}">{{$p->period}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger" id=""></small>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <a href="{{ route('export_quotas_excel') }}" class="btn btn-sm btn-outline-success "> <i class="far fa-file-excel"></i> Generar EXCEL</a>                     
                </div>
                <div class="col-md-3">
                    <a href="{{ route('generate_quotas_pdf') }}" class="btn btn-sm btn-outline-danger "> <i class="far fa-file-pdf"></i> Generar PDF</a>                 
                </div>
            </div>
        </form> <br>
    </div>
</div>

<script>
    $(function () {
      $('#periodo').select2({
          theme: 'bootstrap4'
        })    
    })
    </script>