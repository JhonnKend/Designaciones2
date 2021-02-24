@component('components.edit_card')
	@slot('title')
		Editar datos del Municipio
	@endslot    
	@slot('bodycard')
		{!! Form::model($municipality_edit, ['route' => ['update_municipalities', $municipality_edit[0]->id],'method' => 'POST', 'class' => 'save_date']) !!}                            
			@csrf
			<div class="row">
				<div class="col-md-6">  
					<div class="form-group">
						<label for="name">SELECCIONE DEPARTAMENTO</label>
						<select name="department" id="department_prov" class="form-control select2bs4 select2-danger">
							@forelse($departments as $d)
								@if($municipality_edit[0]->id_departamento === $d->id)          
									<option selected value="{{ $d->id }}">{{ $d->name_department }}</option>
								@else
									<option value="{{ $d->id }}">{{ $d->name_department }}</option>
								@endif
							@empty
								<option value="">No hay Departamentos Registrados</option>
							@endforelse 
						</select>
					</div>		
					<div class="form-group">
						<label for="name">SELECCIONE CODIGO RED</label>
						<select name="id_cod_red" id="id_cod_red" class="form-control select_red select2-danger">
								<option>Seleccione Codigo Red</option>
							@forelse($cod_red as $d)
								@if($d->id === $municipality_edit[0]->cod_red)
									<option selected value="{{ $d->id }}">{{ $d->name_red }}</option>
								@else
									<option value="{{ $d->id }}">{{ $d->name_red }}</option>
								@endif
							@empty
								<option value="">No hay Codigo Red Registrados</option>
							@endforelse
						</select>
					</div>
					<div class="form-group">
						<label for="text">CODIGO MUNICIPIO</label>
						<small class="text-red" id=""></small>
						<input type="text" class="form-control name_form" name="cod_muni" value="{{$municipality_edit[0]->cod_muni}}" placeholder="Ingrese el Codifo de Provincia">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">SELECCIONE PROVINCIA</label>
						<select name="id_province" id="provinces" class="form-control select2bs4 select2-danger clear_options">
							@forelse($province as $d)
								@if($municipality_edit[0]->id_provincia === $d->id)         
								<option selected value="{{ $d->id }}">{{ $d->name_province }}</option>
								@else
									<option value="{{ $d->id }}">{{ $d->name_province }}</option>
								@endif
							@empty
								<option value="">No hay Departamentos Registrados</option>
							@endforelse  
						</select>
					</div>
					<div class="form-group">
						<label for="name">NOMBRE</label>  
						<small class="text-red" id=""></small>        
						<input type="text" class="form-control name_form" name="name_municipality" value="{{$municipality_edit[0]->name_municipality}}" placeholder="Ingrese Nombre de la Provincia">
					</div>
				</div>
			</div>	
			<div class="p-3">
			{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
			{{ Form::reset('Cancelar',['class' => 'btn btn-sm btn-danger']) }}
			</div>
			</div>
		{!! Form::close() !!}
	@endslot
	@slot('action')
	@can('administrar_sistema')
		<button href="{{ route('index_municipalities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
	@endcan
	@endslot
@endcomponent
<script>
	$(function () {
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
		$('.select_red').select2({
		theme: 'bootstrap4'
    })
	})
</script>	