@component('components.index_card')
@slot('title')
    Lista de Designaciones
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
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($lista_estudiantes_sorteo as $d)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $d->ci }}</td>
                        <td>{{ $d->name }} {{ $d->ap_pat }} {{ $d->ap_mat }}</td>
                        <td>{{ $d->name_estable_salud }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" target="_blank" href="{{ route('report_certification',$d->id_estudiante) }}"> <span class="glyphicon glyphicon-print"></span> Certificacion</a>                                
                            <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('report_memorandum',$d->id_estudiante) }}"> <span class="glyphicon glyphicon-print"></span> Memorandum</a>                                
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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