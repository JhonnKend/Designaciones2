@foreach($periodos_habilitados->chunk(4) as $chunk)
<div class="row">                                            
    @foreach($chunk as $add)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Periodo {{$add->period}}</div>
                <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success">Del</span>
                    <span>{{ $add->inicio_rote }}</span>
                    <span class="text-success"> al</span>
                    <span>{{ $add->fin_rote }}</span><span class="mr-2"> </i>
                        <!--button type="button" class="btn btn-outline-info btn-sm"> <i class="fas far fa-edit"></i> </button-->
                        <button type="button" value="{{ $add->id_e_p }}" class="btn btn-outline-info btn-sm cargar_datos_periodo" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                            <i class="fas far fa-edit"></i>
                        </button>
                    </span>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('guardar_fechas_nuevas') }}" method="POST" class="guardar_datos">
                @csrf 
                <input type="hidden" name="id_periodo" id="id_periodo" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fechas de Rote:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha Inicio:</label>
                                <input class="form-control cambiar_fecha" type="date" value="" name="fecha_inicio" id="fecha_i">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Fecha Fin:</label>
                                <input class="form-control" type="text" value="" name="fecha_fin" id="fecha_f" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(function () {
    $('#periodo').select2({
        theme: 'bootstrap4'
    })    
})
</script>