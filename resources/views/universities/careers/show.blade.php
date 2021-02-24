@component('components.show_card')
    @slot('title')
		Detalles de la Carrera
    @endslot    
	@slot('bodycard')
        @forelse($career as $d)
            <div class="table-responsive p-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre de la Carrera:</th>
                            <td>{{ $d->name_career }}</td>
                        </tr>
                        <tr>
                            <th style="width:50%">Nombre de la Facultad:</th>
                            <td>{{ $d->name_faculty }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td>{{ $d->description }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Universidad:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion:</th>
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
                            <th>Pertenece al Municipio:</th>
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
			<button href="{{ route('index_careers') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent