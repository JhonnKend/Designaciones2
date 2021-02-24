@component('components.index_card')
    @slot('title')
		Lista de Departamentos Registrados
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th>CODIGO DEPARTAMENTO</th>
                        <th scope="col">NOMBRE DEPARTAMENTO</th>
                        <th scope="col">FECHA CREACION</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach( $departments as $r)
                    <tr>
                        <th scope="row">{{ $a++ }}</th>
                        <td>{{ $r->cod_depa }}</td>
                        <td>{{$r->name_department}}</td>
                        <td>{{$r->created_at}}</td>
                        <td>
                            @can('administrar_sistema')<a href="{{ route('show_departments') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Departamento" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
                            @can('administrar_sistema')<a href="{{ route('edit_departments') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Editar Departamento" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
                            @can('administrar_sistema')<a href="{{ route('delete_departments') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Departamento" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('administrar_sistema')
                <a href="{{ route('create_departments') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Departamento</a> 
            @endcan
        @endslot
@endcomponent