@component('components.edit_card')
    @slot('title')
		Editar datos del Usuario
    @endslot    
	@slot('bodycard')
	{!! Form::model($user, ['route' => ['update_user', $user->id],'method' => 'POST', 'class' => 'save_date']) !!}                        
		<div class="row">
			<div class="col-sm-4">  
				@csrf
				<div class="form-group">
				<label for="name">NOMBRE</label>
				<input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Ingrese su Nombre">
				</div>
				<div class="form-group">
				<label for="email">EMAIL</label>
				<input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Ingrese su Email">
				</div>
				<div class="p-3">
				{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
				{{ Form::reset('Cancelar',['class' => 'btn btn-sm btn-danger']) }}
				</div>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-6">
				<label for="text"> ROLES PARA ASIGNAR</label>
				<div class="form-group">
					<ul class="list-unstyled">
						@foreach( $roles as $rol)
							<li>
								<label>
									{{ Form::checkbox('roles[]', $rol->id, null) }}
									{{ $rol->name}}
									<small>({{ $rol->description ?: 'Sin descripcion' }})</small>
								</label>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_users') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>