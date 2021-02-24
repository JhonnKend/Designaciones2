@component('components.create_card')
@slot('title')
    Registro Nuevo Tipo de Internado
@endslot    
@slot('bodycard')
    <form action="{{ route('store_internship_types') }}" method="POST" class="save_date">  
        @csrf            
            <div class="col-sm-12">                    
                <div class="card card-success card-outline"> 
                    <div class="card-body">
                        <label class="card-title"><i class="fas fa-digital-tachograph"></i> DATOS GENERALES</label>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Tipo internado</label>
                                    <input type="text" class="change_select form-control name_form" name="name_internship_types" placeholder="Ingrese Nombre del Instituto">
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Nivel Academico</label>
                                    <select class="change_select form-control select2bs4 select2-danger name_form" name="level_ac" id="">
                                        <option value="">Seleccione el Nivel Academico</option>
                                        <option value="1">Licenciatura</option>
                                        <option value="2">Auxiliar</option>
                                    </select>
                                    <small class="text-danger" id=""></small>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control" name="description" id="" placeholder="Ingrese una Descripcion"></textarea>
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
            </div>      
    </form>
@endslot
@slot('action')
    @can('tecnico_sedes')
        <button href="{{ route('index_internship_types') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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