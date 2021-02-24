@component('components.index_card')
    @slot('title')
        Tipos de Internado Registrados
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">TIPO INTERNADO</th>
                        <th scope="col">FECHA REGISTRO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    <?php $a = 1 ?>
                    @foreach( $internship_types as $r)
                    <tr>
                    <th scope="row">{{$a++}}</th>
                    <td>{{$r->name_type}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>
                        @can('tecnico_sedes')<a href="{{ route('show_internship_types') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Tipo Internado" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
                        @can('tecnico_sedes')<a href="{{ route('edit_internship_types') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Editar Tipo Internado" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
                        @can('tecnico_sedes')<a href="{{ route('delete_internship_types') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Tipo Internado" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('tecnico_sedes')
                <a href="{{ route('export_types_internships_excel') }}" class="btn btn-sm btn-outline-success "> <i class="far fa-file-excel"></i> Generar EXCEL</a> 
                <a href="{{ route('generate_types_internships_pdf') }}" class="btn btn-sm btn-outline-danger "> <i class="far fa-file-pdf"></i> Generar PDF</a>                 
            @endcan
            @can('tecnico_sedes')                
                <a href="{{ route('create_internship_types') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo</a> 
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