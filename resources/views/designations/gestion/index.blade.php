@component('components.index_card')
    @slot('title')
        Lista de Gestiones
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">GESTION</th>
                        <th scope="col">ESTADO GESTION</th>                        
                        <th scope="col">FECHA REGISTRO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach($gestion as $r)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $r->gestion }}</td>
                            @if($r->status_gestion === 1)
                                <td class="text-success">Activo</td>
                            @else
                                <td class="text-danger">Inactivo</td>
                            @endif
                            <td>{{ $r->created_at }}</td>                            
                            <td>
                                @can('show_gestion')<a href="{{ route('show_gestion') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Detalles" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
                                @can('edit_gestion')<!--a href="{{ route('edit_gestion') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Editar Tipo Internado" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a-->@endcan
                                @can('delete_gestion')<a href="{{ route('delete_gestion') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Detalles" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('create_gestion')
                <a href="{{ route('create_gestion') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Registrar Nuevo Gestion</a> 
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