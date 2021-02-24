@component('components.show_card')
    @slot('title')
		Detalles de la Instituto
    @endslot    
	@slot('bodycard')
        @forelse($institute as $d)
            <div class="table-responsive p-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre del Instituto:</th>
                            <td>{{ $d->name_institute }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Instituto:</th>
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
			<button href="{{ route('index_institutes') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent