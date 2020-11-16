@component('components.index_card')
    @slot('title')
        Lista de Universidades Registradas
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">NOMBRE UNIVERSIDAD</th>
                        <th scope="col">FECHA REGISTRO</th>
                        <th scope="col">DEPARTAMENTO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @forelse( $universities as $r)
                    <tr>
                    <th scope="row">{{$a++}}</th>
                    <td>{{$r->n_universidad}}</td>
                    <td>{{  date('Y-m-d', strtotime($r->created_at))}}</td>
                    <td>{{$r->name_municipality}}</td>
                    <td>
                        @can('show_universities')<a href="{{ route('show_universities') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Centro Medico" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
                        @can('edit_universities')<a href="{{ route('edit_universities') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Editar Centro Medico" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
                        @can('delete_universities')<a href="{{ route('delete_universities') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Centro Medico" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                    </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" >
                            No hay Universidades Registradas
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('create_universities')
                <a href="{{ route('create_universities') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nueva Universidad</a> 
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