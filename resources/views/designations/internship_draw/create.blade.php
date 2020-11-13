@component('components.create_card')
@slot('title')
    Sorte de Cupo para Estudiantes:
@endslot    
@slot('bodycard')  
    @if($message)
    <center>
        <h3 style="color:red">{{$message}}</h3>
    </center>
    @endif
    <form action="{{ route('quota_draw') }}" method="POST" class="save_date">  
        @csrf  
        <input type="hidden" name="id_student" value="{{ $student->id }}">
        <div class="row">
            <div class="col-md-3">
                <h6>Datos del Estudiante:</h6>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_student">NOMBRES Y APELLIDOS</label>
                            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="{{ $student->name }} {{ $student->ap_pat }} {{ $student->ap_mat }}" disabled>
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_student">CEDULA DE IDENTIDAD</label>
                            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="{{ $student->ci }} {{ $student->exp }}" disabled>
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h6>Datos lugar de Estudio:</h6>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name_student">CARRERA</label>
                            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante"  value="{{ $students[0]->name_career }}" disabled>
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name_student">FACULTAD</label>
                            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="{{ $students[0]->name_faculty }} " disabled>
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name_student">UNIVERSIDAD</label>
                            <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="{{ $students[0]->name_university }}" disabled>
                            <small class="text-danger" id=""></small>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <!--div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h6>Lista de Cupos Disponibles</h6>
                <div class="table-responsive p-3">
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">NRO.</th>
                                <th scope="col">CENTRO MEDICO</th>
                                <th scope="col">TIPO CUPO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div-->
        <div class="row">
            <div class="col-md-3">
                <h6></h6>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Nivel Academico</label>
                    @if($student->level_ac == 1)
                    <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="Licenciatura"  disabled>
                    @else
                    <input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante" value="Auxiliar"  disabled>
                    @endif
                    <small class="text-danger" id=""></small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Periodo</label>
                    <select type="text" class="change_select form-control name_form" name="periodo" value="">
                        <option value="1">1/{{ date('Y')}}</option>
                        <option value="2">2/{{ date('Y')}}</option>
                        <option value="3">3/{{ date('Y')}}</option>
                        <option value="4">4/{{ date('Y')}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success"> <i class="far fa-save"></i> Realizar Sorteo</button>
            </div>
        </div>
    </form>
@endslot
@slot('action')
    @can('index_internship_draw')
        <button href="{{ route('index_internship_draw') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
    @endcan
@endslot
@endcomponent
@if( session()->has('info'))
<script>
$(function(){        
    toastr.options = {
    "closeButton": true,
    "progressBar": true,
    }
    toastr.{{ session('info')['status'] }}('{{ session("info")["content"] }}');
})
</script>
@endif
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