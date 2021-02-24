@component('components.show_card')
    @slot('title')
        Detalles Centro de Salud
    @endslot    
	@slot('bodycard')
	<div class="col-8">
    @forelse($medical_center as $d)
            <div class="table-responsive p-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre del Centro Medico:</th>
                            <td>{{ $d->name_estable_salud }}</td>
                        </tr>
                        <tr>
                            <th>Codigo Centro Medico:</th>
                            <td>{{ $d->cod_estable_salud }}</td>
                        </tr>
                        <tr>
                            <th>Cuenta con:</th>
                            <td>
                                @forelse($medical_center_dates as $dm)
                                    {{ ' '.$dm->name }}, 
                                @empty
                                    No existen Datos Registrados
                                @endforelse
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Centro Medico:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Centro Medico:</th>
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
        </div>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_medicalCenter') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent