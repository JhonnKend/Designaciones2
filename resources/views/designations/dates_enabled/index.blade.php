@component('components.index_card')
    @slot('title')
        Fechas Habilitadas para Registro de Estudiantes
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">GESTION</th>
                        <th scope="col">PERIODO</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">FECHA INICIO</th>
                        <th scope="col">FECHA FIN</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach($periodos_enabled as $r)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $r->gestion }}</td>
                            <td>{{ $r->period }}</td>
                            @if($r->status_ === 1)
                                <td class="text-success">Habilitido</td>
                            @else
                                <td class="text-danger">Inabilitado</td>
                            @endif
                            <td>{{ $r->date_start }}</td>
                            <td>{{ $r->date_end }}</td>
                            <td>
                                @can('show_periods')<!--a href="{{ route('show_periods') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Detalles" data-original-title="More Color"> <i class="far fa-eye"></i> </a-->@endcan
                                @can('edit_periods')<a href="{{ route('edit_date_enabled') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Modificar Fechas" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
                                @can('delete_periods')<a href="{{ route('delete_date_enabled') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Fecha" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('create_enable_periods')
                <a href="{{ route('create_enable_periods') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Registrar Nuevo Periodo de Registro</a> 
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