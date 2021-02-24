@component('components.create_card')
    @slot('title')
		Registro Provincias Nuevos
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_provinces') }}" method="POST" class="save_date">   
		<div class="col-6">
			@csrf			
			<div class="form-group">
			<label for="name">SELECCIONE DEPARTAMENTO</label>
				<select name="department" class="form-control select2bs4 move_option">
				@forelse($departments as $d)
					<option  value="{{ $d->id }}">{{ $d->name_department }}</option>
				@empty
					<option value="">No hay Departamentos Registrados</option>
				@endforelse
				</select>
			</div>
			<div class="form-group">
			<label for="name">NOMBRE PROVINCIA</label> <br/>
				<small class="text-red" id=""></small>
				<input type="text" class="form-control name_form" name="name_province" placeholder="Ingrese Nombre de la Provincia">
			</div>
			<div class="form-group">
			<label for="cod_depa">CODIGO PROVINCIA</label> <br/>
				<small class="text-red" id=""></small>
				<input type="text" class="form-control name_form" name="cod_prov" placeholder="Ingrese Codigo de la Provincia">
			</div>
			<div class="p-2">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>       
		</div>
  	</form>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_provinces') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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