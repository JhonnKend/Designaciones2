@component('components.edit_card')
    @slot('title')
		Editar datos Tipos Internado
    @endslot    
    @slot('bodycard')
    <form action="{{ route('update_internship_types', $edit_internship_type->id) }}" method="POST" class="save_date">  
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Tipo internado</label>
                            <input value="{{ $edit_internship_type->name_type }}" type="text" class="change_select form-control name_form" name="name_internship_types" placeholder="Ingrese Nombre del Instituto">
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" name="description" id="" placeholder="Ingrese una Descripcion">{{ $edit_internship_type->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button>
                        <button type="reset" class="btn btn-danger"> <i class="fas fa-times"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
	@endslot
	@slot('action')
		@can('tecnico_sedes')
			<button href="{{ route('index_internship_types') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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