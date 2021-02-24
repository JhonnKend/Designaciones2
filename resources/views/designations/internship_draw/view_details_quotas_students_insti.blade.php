@component('components.index_card')
    @slot('title')
        DETALLES DESIGNACION PARA ESTUDIANTES
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
        <div class="my_title">
            <h6>
                DATOS ESTUDIANTE
            </h6>
        </div>
        <div class="row ">
            <div class="col-md-4">
                <div class="file_1">
                    <center>
                        <img src="{{ asset('img/icon-user.png') }}" alt="..." class="img-circle" height="200">
                    </center>
                    <div class="datos">
                        <div class="fila">
                            <p> <strong>CI:</strong> {{ $student->ci}} {{ $student->exp}}</p>
                        </div>
                        <div class="fila">
                            <p> <strong>NOMBRES:</strong> {{ $student->name}} {{ $student->ap_pat}} {{ $student->ap_mat}}</p>
                        </div>
                        <div class="fila">
                            <p> <strong>CORREO:</strong> {{ $student->correo}}</p>
                        </div>
                        <div class="fila">
                            <p> <strong>DIRECCION:</strong> {{ $student->direccion}}</p>
                        </div>
                        <div class="fila">
                            <p> <strong>TELEFONO:</strong> {{ $student->celular}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="fila_2">
                    <div class="title_2">
                        <h6>DATOS DE ESTUDIO</h6>
                    </div>
                    <div class="datos_filas">
                        <div class="mar">
                            <div class="title_date">DEPARTAMENTO:</div>
                            <div class="content_date">
                                <p>{{ $student_dates->name_department }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">PROVINCIA:</div>
                            <div class="content_date">
                                <p>{{ $student_dates->name_province }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">MUNICIPIO:</div>
                            <div class="content_date">
                                <p>{{ $student_dates->name_municipality }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">INSTITUTO:</div>
                            <div class="content_date">
                                <p>{{ $student_dates->name_institute }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">CARRERA:</div>
                            <div class="content_date">
                                <p>{{ $student_dates->name_career }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fila_2_1">
                    <div class="title_2">
                        <h6>DATOS DESIGNACION</h6>
                    </div>
                    <div class="datos_filas">
                        <div class="mar">                        
                            <div class="title_date">CENTRO DE SALUD:</div>
                            <div class="content_date">
                                <p>{{ $student->name_estable_salud }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">FECHA DESIGNACION:</div>
                            <div class="content_date">
                                <p>{{ $student->designation_date }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">PERIODO:</div>
                            <div class="content_date">
                                <p>{{ $student->periodo}} / {{ date('Y') }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">FECHA INICIO:</div>
                            <div class="content_date">
                                <p>{{ $student->start_date }}</p>
                            </div>
                        </div>
                        <div class="mar">                        
                            <div class="title_date">FECHA FIN:</div>
                            <div class="content_date">
                                <p>{{ $student->end_date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="btns mtop-16">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-success btn-xs" target="_blank" href="{{ route('report_certification',$student->id) }}"> <span class="glyphicon glyphicon-print"></span> Imprimir Certificacion</a>                                
                                <a class="btn btn-primary btn-xs" target="_blank" href="{{ route('report_memorandum',$student->id) }}"> <span class="glyphicon glyphicon-print"></span> Imprimir Memorandum</a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endslot
    @slot('action')
        @can('tecnico_sedes')
            <!--a href="{{ route('create_internship_types') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo</a--> 
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