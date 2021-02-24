@component('components.show_card')
    @slot('title')
        Detalles del Departamento
    @endslot    
	@slot('bodycard')
	<div class="row">
		<div class="col-md-6">
			<p class="lead">Datos de: {{ $user->name }}</p>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
                            <th style="width:50%">Nombre Usuario:</th>
                            <td>{{ $user->name }}</td>
						</tr>
						<tr>
                            <th style="width:50%">Nombre Usuario:</th>
                            <td>{{ $user->email }}</td>
						</tr>
						<tr>
                            <th style="width:50%">Fecha Registro:</th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
					</tbody>
				</table>
			</div>			
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<p class="lead">Roles Asignados</p>
			<div class="table-responsive">
                <table class="table">
                    <tbody>    
                            @forelse($role_user as $r_p)
                                <tr>
									<td>
										{{$r_p->name}} <small class="text-green text-size-help">({!! empty($r_p->description) ? 'No tiene descrpcion':$r_p->description !!}).</small> 
									</td>	
								</tr>
                            @empty
                                <td class="text-red">  No existe Roles asignados para este Usuario</td>
                            @endforelse
                    </tbody>
                </table>    
            </div>
		</div>
	</div>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_users') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent