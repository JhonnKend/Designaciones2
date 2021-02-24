@component('components.show_card')
    @slot('title')
        Detalles del Departamento
    @endslot    
	@slot('bodycard')
	<div class="col-8">
            @forelse($department as $depa)
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre Departamento:</th>
                            <td>{{ $depa->name_department }}</td>
                        </tr>
                        <tr>
                            <th>Codigo Departamento:</th>
                            <td>{{ $depa->cod_depa }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Departamento:</th>
                            <td>{{ $depa->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion:</th>
                            <td>{{ $depa->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Usuario que Registro:</th>
                            <td>{{ $depa->name }}</td>
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
			<button href="{{ route('index_departments') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent