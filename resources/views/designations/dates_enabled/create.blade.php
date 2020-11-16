@component('components.create_card')
@slot('title')
    Registro Nuevo Periodo de Registro de Estudiantes
@endslot    
@slot('bodycard')
    
@endslot
@slot('action')
    @can('index_enable_periods')
        <button href="{{ route('index_enable_periods') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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