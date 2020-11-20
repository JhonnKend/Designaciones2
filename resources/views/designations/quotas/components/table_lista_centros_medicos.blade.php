<div class="table-responsive">
    <table id="example" class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">CODIGO</th>
                <th scope="col">ESTABLECIMIENTO</th>
                <th scope="col">MUNICIPIO</th>
                @foreach ($tipos_internado as $item)
                <th scope="col">{{ strtoupper($item->name_type) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <?php $a = 1 ?>
            @foreach($list_medical_centers as $t)
                <tr>
                    <form id="form{{$t->id}}" action="{{ route('guardar_cupos') }}" method="POST" class="guardar_cupos">
                        <input form="form{{$t->id}}" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_{{$t->id}}" value="{{$t->id}}">
                        <input type="hidden" name="ges_{{$t->id}}" value="{{$gestion}}">
                        <input type="hidden" name="per_{{$t->id}}" value="{{$periodo}}">
                        <td>{{$a++}}</td>
                        <td>{{$t->name_estable_salud}}</td>
                        <td>{{$t->name_municipality}}</td>
                        <td>
                            <input value="{{$t->m}}" form="form{{$t->id}}" name="med_{{$t->id}}" class="form-control form-control-sm guardar_cupos" type="number" min="0" placeholder="" style="width : 70px; heigth : 1px">    
                        </td>
                        <td>
                            <input value="{{$t->e}}" form="form{{$t->id}}" name="enf" class="form-control form-control-sm guardar_cupos" type="number" min="0" placeholder="" style="width : 70px; heigth : 1px">    
                        </td>  
                        <td>
                            <input value="{{$t->d}}" form="form{{$t->id}}" name="den" class="form-control form-control-sm guardar_cupos" type="number" min="0" placeholder="" style="width : 70px; heigth : 1px">    
                        </td>             
                    </form>        
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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