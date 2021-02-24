@component('components.index_card')
    @slot('title')
    <i class="fa fa-list" aria-hidden="true"></i>
        Lista de Cupos Registrados
    @endslot    
    @slot('bodycard')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <select name="gestion" id="gestion" class="change_select form-control select2bs4 select2-danger name_form change_load_view">
                    <option value="">Seleccione una Gestion</option>
                    @foreach($gestion as $g)
                        <option value="{{$g->id}}">{{$g->gestion}}</option>
                    @endforeach
                </select>
                <small class="text-danger" id=""></small>
            </div>
        </div>
    </div>
    <div id="cargar_aqui_lista"></div>          
    <div class="row" style="font-size: 12px">
        <div class="col-md-12">
            <div class="table-responsive">
                    <table id="load_table_list" class="table align-items-center table-flush">
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
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endslot
        @slot('action')
            @can('tecnico_sedes')                
            @endcan
            @can('tecnico_sedes')
                <a href="{{ route('create_quotas') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Registrar Cupos</a> 
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
      $('#gestion').select2({
          theme: 'bootstrap4'
        })    
    })
    </script>