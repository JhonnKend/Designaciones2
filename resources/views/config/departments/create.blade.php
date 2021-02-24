@component('components.create_card')
    @slot('title')
		Registro Departamentos Nuevos
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_departments') }}" method="POST" class="save_date">   
		<div class="col-sm-6">
			@csrf
			<div class="form-group">
				<label for="name">NOMBRE DEPARTAMENTO</label> <br>
				<small class="text-red" id=""></small>
				<input type="text" class="form-control name_form" name="name_department" placeholder="Ingrese Nombre del Departamento">
			</div>
			<div class="form-group">
				<label for="cod_depa">CODIGO DEPARTAMENTO</label> <br>
				<small class="text-red" id=""></small>
				<input type="text" class="form-control name_form" name="cod_depa" placeholder="Ingrese Codigo del Departamento">
			</div>
			<div class="p-2">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>      
		</div>
		<div class="col-md-1"></div>      
	</form>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_departments') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent