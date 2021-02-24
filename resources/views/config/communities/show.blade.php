@component('components.show_card')
    @slot('title')
        Detalles Comunidad
    @endslot    
	@slot('bodycard')
        @forelse($community as $d)
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre de la Comunidad:</th>
                            <td>{{ $d->name_community }}</td>
                        </tr>
                        <tr>
                            <th>Codigo Comunidad:</th>
                            <td>{{ $d->cod_comu }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Comunidad:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Comunidad:</th>
                            <td>{{ $d->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Pertenece al Municipio:</th>
                            <td>{{ $d->name_municipality }}</td>
                        </tr>
                        <tr>
                            <th>Pertenece a la Provincia:</th>
                            <td>{{ $d->name_province }}</td>
                        </tr>
                        <tr>
                            <th>Pertenece al Departamento:</th>
                            <td>{{ $d->name_department }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @empty
                asdas
            @endforelse
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_communities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent