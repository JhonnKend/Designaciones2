@component('components.edit_card')
    @slot('title')
		Editar datos Provincia
    @endslot    
	@slot('bodycard')
  {!! Form::model($province_edit, ['route' => ['update_provinces', $province_edit->id],'method' => 'POST', 'class' => 'save_date']) !!}                            
      <div class="col-6">  
        @csrf
        <div class="form-group">
          <label for="name">SELECCIONE DEPARTAMENTO</label>
            <select name="department" class="form-control select2bs4 select2-danger">
              @forelse($departments as $d)
                @if($province_edit->id_department === $d->id)
                  <p>{{ $province_edit->id_department }} {{ $d->id}}</p>             
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
          <label for="name">NOMBRE</label>  
          <small class="text-red" id=""></small>        
          <input type="text" class="form-control name_form" name="name_province" value="{{$province_edit->name_province}}" placeholder="Ingrese Nombre de la Provincia">
        </div>
        <div class="form-group">
          <label for="text">CODIGO DEPARTAMENTO</label>
          <small class="text-red" id=""></small>
          <input type="text" class="form-control name_form" name="cod_prov" value="{{$province_edit->cod_prov}}" placeholder="Ingrese el Codifo de Provincia">
        </div>
        <div class="p-3">
          {{ Form::submit('Guardar',['class' => 'btn btn-primary']) }}
          {{ Form::reset('Cancelar',['class' => 'btn btn-danger']) }}
        </div>
      </div>
      <div class="col-6"></div>
  {!! Form::close() !!}
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