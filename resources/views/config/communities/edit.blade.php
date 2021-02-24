@component('components.edit_card')
    @slot('title')
		Editar datos de la Comunidad
    @endslot    
	@slot('bodycard')
	{!! Form::model($community_edit, ['route' => ['update_communities', $community_edit[0]->id],'method' => 'POST', 'class' => 'save_date']) !!}                        

      <div class="col-sm-6">  
        @csrf
        <div class="form-group">
          <label for="name">SELECCIONE DEPARTAMENTO</label>
          <small class="text-red" id=""></small>
            <select name="department" id="department_prov" class="name_form form-control select2bs4 select2-danger">
              @forelse($departments as $d)
                @if($community_edit[0]->id_department === $d->id)
                  <p>{{ $community_edit[0]->id_department }} {{ $d->id}}</p>             
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
          <label for="name">SELECCIONE PROVINCIA</label>
          <small class="text-red" id=""></small>
            <select name="id_province" id="provinces" class="name_form form-control select2bs4 select2-danger clear_options">
              @forelse($province as $d)
                @if($community_edit[0]->id_province === $d->id)
                  <p>{{ $community_edit[0]->id_department }} {{ $d->id}}</p>             
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
          <label for="name">SELECCIONE MINICIPIO</label>
          <small class="text-red" id=""></small>
            <select name="id_municipality" id="municipalities" class="name_form clear_options_prov form-control select2bs4 select2-danger clear_options">
              @forelse($municipalities as $d)
                @if($community_edit[0]->id_muni === $d->id)            
                  <option selected value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                @else
                  <option value="{{ $d->id }}">{{ $d->name_municipality }}</option>
                @endif
              @empty
                <option value="">No hay Departamentos Registrados</option>
              @endforelse  
            </select>
        </div>
        <div class="form-group">
          <label for="name">NOMBRE</label>  
          <small class="text-red" id=""></small>        
          <input type="text" class="form-control name_form" name="name_community" value="{{$community_edit[0]->name_community}}" placeholder="Ingrese Nombre de la Provincia">
        </div>
        <div class="form-group">
          <label for="text">CODIGO COMUNIDAD</label>
          <small class="text-red" id=""></small>
          <input type="text" class="form-control name_form" name="cod_comu" value="{{$community_edit[0]->cod_comu}}" placeholder="Ingrese el Codifo de Provincia">
        </div>
        <div class="p-3">
          {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
          {{ Form::reset('Cancelar',['class' => 'btn btn-sm btn-danger']) }}
        </div>
      </div>
      <div class="col-sm-1"></div>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_communities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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