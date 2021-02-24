@component('components.show_card')
    @slot('title')
		Detalles Provincia
    @endslot    
	@slot('bodycard')
    @forelse($provinces as $d)
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre de la Provincia:</th>
                            <td>{{ $d->name_province }}</td>
                        </tr>
                        <tr>
                            <th>Codigo Provincia:</th>
                            <td>{{ $d->cod_prov }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Provincia:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion:</th>
                            <td>{{ $d->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Pertenece a:</th>
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
			<button href="{{ route('index_provinces') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent