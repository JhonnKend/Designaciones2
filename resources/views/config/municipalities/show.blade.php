@component('components.show_card')
    @slot('title')
		Detalles Municipio
    @endslot    
    @slot('bodycard')
        <div class="col-8">
        @forelse($municipality as $d)
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre de la Municipio:</th>
                            <td>{{ $d->name_municipality }}</td>
                        </tr>
                        <tr>
                            <th>Codigo Municipio:</th>
                            <td>{{ $d->cod_muni }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Municipio:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion:</th>
                            <td>{{ $d->updated_at }}</td>
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
</div>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_municipalities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent