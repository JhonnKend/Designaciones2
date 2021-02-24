@component('components.create_card')
@slot('title')
    Registro Nueva Gestion
@endslot    
@slot('bodycard')
    <form action="{{ route('store_gestion') }}" method="POST" class="save_date">  
        @csrf            
            <div class="col-sm-12">
                <div class="card card-success card-outline"> 
                    <div class="card-body">
                        <label class="card-title"><i class="fas fa-digital-tachograph"></i> DATOS GENERALES</label>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Gestion</label>
                                    <input type="text" class="change_select form-control name_form" name="gestion" placeholder="Ingrese la Gestion a Registrar">
                                    <small class="text-danger" id=""></small>
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
        <button href="{{ route('index_gestion') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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