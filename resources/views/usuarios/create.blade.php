@component('components.create_card')
    @slot('title')
		Registrar Nuevo Usuario
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_users') }}" method="POST" class="save_date">  
		<div class="row">
			<div class="col-md-6">
				@csrf
				<div class="form-group">
					<label for="name">NOMBRE</label>
					<small class="text-danger" id=""></small>
					<input type="text" class="form-control name_form change_select" name="name" placeholder="Ingrese su Nombre">
				</div>
				<div class="form-group">
					<label for="email">EMAIL</label>
					<small class="text-danger" id=""></small>
					<input type="email" class="form-control name_form change_select" name="email" placeholder="Ingrese su Email">
				</div>
				<div class="form-group">
					<label for="password">CONTRASEÑA</label>
					<small class="text-danger" id=""></small>
					<input type="password" class="form-control name_form change_select" name="password" placeholder="Password">
				</div>  
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">TIPO USUARIO</label>
					<small class="text-danger" id=""></small>
					<select type="text" class="form-control name_form select2bs4 change_select" name="tipo_usuario">
						<option value="">Seleccione el Tipo de Usuario</option>
						<option value="0">Administrador</option>
						<option value="3">Tecnico SEDES(Doctor)</option>
					</select>
				</div>
				<label for="text"> ROLES PARA ASIGNAR</label>
				<div class="form-group">
				<ul class="list-unstyled">
					@foreach( $roles as $role)
						<li>
							<label>
								{{ Form::checkbox('roles[]', $role->id, null) }}
								{{ $role->name}}
								<small>({{ $role->description ?: 'Sin descripcion' }})</small>
							</label>
						</li>
					@endforeach
				</ul>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Registrar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>
	</form>	
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