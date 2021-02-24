@component('components.index_card')
    @slot('title')
		Lista de Usuarios Registrados
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
						<th scope="col">Nro</th>
						<th scope="col">NOMBRE</th>
						<th scope="col">EMAIL</th>
						<th>FECHA REGISTRO</th>
						<th scope="col">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach( $users as $user)
                    <tr>
                        <th scope="row">{{ $a++ }}</th>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->created_at}}</td>
						<td>
							@can('administrar_sistema')<a href="{{ route('show_users') }}" class="btn btn-success btn-sm show_function" value="{{ $user->id }}" title="Ver Usuario" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
							@can('administrar_sistema')<a href="{{ route('edit_users') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $user->id }}" title="Editar Usuario" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
							@can('administrar_sistema')<a href="{{ route('delete_users') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $user->id }}" title="Borrar Usuario" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
						</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('administrar_sistema')
                <a href="{{ route('create_users') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Usuario</a> 
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
