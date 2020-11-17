@component('components.index_card')
    @slot('title')
        Formulario Sorte Estudiantes de Universidades
    @endslot    
    @slot('bodycard')
    <form action="{{ route('search_students_uni_') }}" method="POST" class="save_date">
        @csrf  
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <select name="tipo_internado" id="tipo_internado" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione tipo de Internado</option>
                        @foreach($tipos_internado as $t)
                            <option value="{{$t->id}}">{{$t->name_type}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="gestion" id="gestion" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione una Gestion</option>
                        @foreach($gestion as $g)
                            <option value="{{$g->id}}">{{$g->gestion}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="periodo" id="periodo" class="change_select form-control select2bs4 select2-danger name_form">
                        <option value="">Seleccione un Periodo</option>
                        @foreach($periodo as $p)
                            <option value="{{$p->id}}">{{$p->period}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-search"></i> Buscar Estudiantes</button>
            </div>
        </div>
    </form> <br>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">ESTUDIANTE</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>            
    @endslot
    @slot('action')
        @can('create_internship_types')
            <!--a href="{{ route('create_internship_types') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo</a--> 
        @endcan
    @endslot
@endcomponent
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
<script>
$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
})
</script>