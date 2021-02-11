@component('components.index_card')
@slot('title')
    Lista Preliminar de Sorteo de Estudiantes
@endslot    
@slot('bodycard')
    <div class="card-body">
        <table id="example" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">NRO.</th>
                    <th scope="col">C.I.</th>
                    <th scope="col">ESTUDIANTE</th>
                    <th scope="col">ESTABLECIMIENTO SALUD DESIGNADO</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($lista_estudiantes_sorteo as $as)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $as->ci }}</td>
                        <td>{{ $as->name }} {{ $as->ap_pat }} {{ $as->ap_mat }}</td>
                        <td>{{ $as->name_estable_salud }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <form action="{{ route('sorteo_tentativo') }}" method="POST" class="save_date">
            @csrf  
            <input type="hidden" name="datos" value="{{ $datos_enviar }}">
            <h6 class="card-title text-success"> DATOS PARA EL SORTEO</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tipo Internado</label>
                        <input class="form-control" type="text" value="{{$tipos_internado[0]->name_type}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cantidad de Cupos Disponibles</label>
                        <input class="form-control" type="text" value="{{$cantidad}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cantidad de Estudiates</label>
                        <input class="form-control" type="text" value="{{$cantidad_estudiantes}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 align-content-center">
                    <button type="submit" class="btn btn-success">Volver a Sortear</button>
                </div>    
                <div class="col-md-6 align-content-center">
                    <button type="button" class="btn btn-danger confirmar_sorteo">Confirmar Sorteo</button>
                </div>  
            </div>
        </form>
    </div>
@endslot
@slot('action')
    @can('create_internship_types')
        <!--a href="{{ route('create_internship_types') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo</a--> 
    @endcan
@endslot
@endcomponent
<script>
$(document).ready(function() {
$('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar por:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
} );
</script>