@component('components.show_card')
    @slot('title')
        Lista de Estudiantes
        
    @endslot    
    @slot('bodycard')
    <form action="{{ route('search_students') }}" class="save_dates"  method="POST">
        @csrf  
    <div class="row">
        <div class="col-md-3">            
            <div class="form-group">
                <select name="id_carrera" id="" class="change_select form-control select2bs4 select2-danger name_form">
                    <option>Seleccione Carrera</option>
                    @foreach($careers as $r)
                        <option value="{{ $r->id }}"> {{ $r->name_career }} </option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>   
        </div>
        <div class="col-md-3">            
            <div class="form-group">
                <select name="gestion" id="" class="change_select form-control select2bs4 select2-danger name_form">
                    <option>Seleccione Gestion</option>
                    @foreach($gestion as $g)
                        <option value="{{ $g->id }}"> {{ $g->gestion }} </option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>   
        </div>
        <div class="col-md-3">            
            <div class="form-group">
                <select name="periodo" id="" class="change_select form-control select2bs4 select2-danger name_form">
                    <option>Seleccione Periodo</option>
                    @foreach($periodos as $r)
                        <option value="{{ $r->id }}"> {{ $r->period }} </option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>   
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-search"></i>
                </span>
                <span class="text">Cargar Estudiantes</span>
            </button>   
        </div>
    </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>Nombres y Apellidos</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody  class="aqui_cargar">

                </tbody>
            </table>
        </div>
    </div>
	@endslot
	@slot('action')
		@can('administrar_sistema')
			<button href="{{ route('index_universities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar por:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
} );
</script>