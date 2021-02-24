@component('components.edit_card')
    @slot('title')
		Editar datos Departamento
    @endslot    
	@slot('bodycard')
		{!! Form::model($department_edit, ['route' => ['update_departments', $department_edit[0]->id],'method' => 'POST', 'class' => 'save_date']) !!}                        
			<div class="col-sm-6">  
				@csrf
				<div class="form-group">
				<label for="name">NOMBRE</label>  
				<small class="text-red" id=""></small>        
				<input type="text" class="form-control name_form" name="name_department" value="{{$department_edit[0]->name_department}}" placeholder="Ingrese su Nombre">
				</div>
				<div class="form-group">
				<label for="text">CODIGO DEPARTAMENTO</label>
				<small class="text-red" id=""></small>
				<input type="text" class="form-control name_form" name="cod_depa" value="{{$department_edit[0]->cod_depa}}" placeholder="Ingrese su Email">
				</div>
				<div class="p-3">
				{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
				{{ Form::reset('Cancelar',['class' => 'btn btn-sm btn-danger']) }}
				</div>
			</div>
			<div class="col-sm-1"></div>
		{!! Form::close() !!}
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_departments') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent