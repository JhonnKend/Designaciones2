@component('components.create_card')
    @slot('title')
		Registrar Nueva Comunidad
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_communities') }}" method="POST" class="save_date p-4">  
      <div class="col-sm-6">
        @csrf
        <div class="form-group">
          <label for="name">SELECCIONE DEPARTAMENTO</label>
            <small class="text-red" id=""></small>
            <select name="id_department" id="department_prov" class="form-control select2bs4 select2-danger name_form">
              <option>Seleccione Departamento</option>
              @forelse($departments as $d)
                <option  value="{{ $d->id }}">{{ $d->name_department }}</option>
              @empty
                <option value="">No hay Departamentos Registrados</option>
              @endforelse
            </select>
        </div>
        <div class="form-group">
          <label for="name">SELECCIONE PROVINCIA</label>
            <small class="text-red" id=""></small>
            <select name="id_province" id="provinces" class="form-control select2bs4 select2-danger clear_options name_form">
              <option value="">No hay Provincias</option>
            </select>
        </div>
        <div class="form-group">
          <label for="name">SELECCIONE MUNICIPIO</label>
            <small class="text-red" id=""></small>
            <select name="id_municipality" id="municipalities" class="form-control select2bs4 select2-danger clear_options_prov name_form">
                <option value="">No hay Municipios</option>
            </select>
        </div>
        <div class="form-group">
          <label for="name">NOMBRE COMUNIDAD</label>
            <small class="text-red" id=""></small>
              <input type="text" class="form-control name_form" name="name_community" placeholder="Ingrese Nombre del Municipio">
        </div>
        <div class="form-group"> 
          <label for="cod_depa">CODIGO COMUNIDAD</label>
            <small class="text-red" id=""></small>
              <input type="text" class="form-control name_form" name="cod_comu" placeholder="Ingrese Codigo del Municipio">
        </div>
        <div class="p-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
      </div>   
      <div class="col-md-1"></div>      
  </form>
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