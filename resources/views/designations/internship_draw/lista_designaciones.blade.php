<?php $a = 1 ?>
@foreach($lista_estudiantes_designados as $d)
    <tr>
        <td>{{ $a++ }}</td>
        <td>{{ $d->ci }}</td>
        <td>{{ $d->name }} {{ $d->ap_pat }} {{ $d->ap_mat }}</td>
        <td>{{ $d->name_estable_salud }}</td>
        <td>
            <!--a type="button" class="btn btn-outline-success btn-sm" target="_blank" href="{{ route('report_certification',$d->id_estudiante) }}" data-toggle="tooltip" data-placement="top" title="IMPRIMIR CERTIFICACION"> <i class="fas fa-print"></i></a>
            <a class="btn btn-outline-primary btn-sm" target="_blank" href="{{ route('report_memorandum',$d->id_estudiante) }}" title="IMPRIMIR MEMORANDUM"> <span class="glyphicon glyphicon-print"></span> <i class="fas fa-print"></i></a-->
            <a class="btn btn-outline-success btn-sm show_function" value="{{$d->id_estudiante}}" href="{{ route('ver_designacion') }}" title="VER DESIGNACION"><i class="fas fa-eye"></i></a>
            <a class="btn btn-outline-danger btn-sm edit_function" value="{{$d->id_estudiante}}" href="{{ route('editar_designacion') }}" title="EDITAR DESIGNACION"><i class="fas fa-edit"></i></a>
        </td>
    </tr>
@endforeach