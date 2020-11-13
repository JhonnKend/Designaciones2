@component('components.index_card')
    @slot('title')
        Datos de la Universidad
    @endslot    
    @slot('bodycard')
    <div class="row">
        <div class="col-md-4">
            <center>
                <img class="img_universidad" src="img/icons_universidades/uatf.png" alt="">
            </center>
        </div>
        <div class="col-md-8">
            <div class="form-group">
            <input class="form-control" type="text" placeholder="" id="" readonly="" value="{{ $perfil_university->name_university }}">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="" id="" readonly="" value="{{ $perfil_university->name_department }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="" id="" readonly="" value="{{ $perfil_university->name_province }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="" id="" readonly="" value="{{ $perfil_university->name_municipality }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <a href="#" class="btn btn btn-success btn-block"><i class="fab fa-edit fa-fw"></i> Editar Datos</a>
                </div>
                <div class="col-md-5">
                    <a href="#" class="btn btn btn-info btn-block"><i class="fab fa-edit fa-fw"></i> Cambiar Contraseña</a>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    @endslot
    @slot('action')
        @can('create_universities')
            <a href="{{ route('create_universities') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nueva Universidad</a> 
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