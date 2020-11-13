
<?php $a = 1 ?>
@foreach ($studiantes as $item)
    <tr>
        <td> {{$a++}} </td>
        <td> {{$item->name}} {{$item->ap_pat}} {{$item->ap_mat}}</td>
        <td> {{$item->created_at}} </td>
        <td> 
            <a href="{{ route('show_universities') }}" class="btn btn-success btn-sm show_function" value="{{ $item->id }}" title="Ver Centro Medico" data-original-title="More Color"> <i class="far fa-eye"></i> </a>
            <a href="{{ route('edit_universities') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $item->id }}" title="Editar Centro Medico" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>
            <a href="{{ route('delete_universities') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $item->id }}" title="Borrar Centro Medico" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>
        </td>
    </tr>
@endforeach
