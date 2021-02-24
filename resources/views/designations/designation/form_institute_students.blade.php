@component('components.index_card')
    @slot('title')
        Formulario Sorte Estudiantes de Institutos
    @endslot    
    @slot('bodycard')
        <div class="card-body">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">ESTUDIANTE</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach($list_students as $d)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $d->name }} {{ $d->ap_pat }} {{ $d->ap_mat }}</td>
                            @if($d->status_designation === 1)
                                <td class="text-success">Designado</td>
                                <td>
                                    @can('view_designation')<a href="{{ route('view_designation') }}" class="btn btn-primary btn-sm show_function"  value="{{ $d->id }}" title="Ver Designacion" data-original-title="More Color"> <i class="fas fa-trash-altt"></i> Ver Designacion</a>@endcan                                    
                                </td>
                            @else
                                <td class="text-danger">No Designado</td>      
                                <td>
                                    @can('start_designation_insti')<a href="{{ route('start_designation_insti') }}" class="btn btn-success btn-sm edit_function"  value="{{ $d->id_student }}" title="Iniciar Designacion" data-original-title="More Color"> <i class="fas fa-trash-altt"></i> Designar</a>@endcan
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endslot
    @slot('action')
        @can('tecnico_sedes')
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