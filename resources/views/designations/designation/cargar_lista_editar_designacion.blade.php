<h6 class="card-title text-success"> DATOS PARA LA NUEVA DESIGNACION</h6>
<div class="row">    
    <div class="col-md-8">
        <div class="form-group">
            <select name="cupo_disponible" id="cupo_disponible" class="change_select form-control select2bs4 select2-danger name_form">
                <option value="">Seleccione el Establecimiento de Salud</option>
                @foreach($cupos_disponibles as $g)
                    <option value="{{$g->id}}">{{ $g->name_municipality }} {{ $g->name_estable_salud }}</option>
                @endforeach
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#cupo_disponible').select2({
            theme: 'bootstrap4'
        })
    })
</script>