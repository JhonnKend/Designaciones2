@component('components.index_card')
    @slot('title')
        Inicio Sorteo Estudiantes
    @endslot    
    @slot('bodycard')
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <div class="col-md-6">
                    <center>
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                            <h5 class="card-title">Estudiantes Universitarios</h5>
                            <p class="card-text">Ver Listas de estudiantes designados de las diferentes Universidades.</p>
                            <a type="button" href="{{ route('list_student_univesity') }}" class="btn btn-success start_load_url">Ver Listas</a>
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <div class="card" style="width: 25rem;">
                            <div class="card-body">
                            <h5 class="card-title">Estudiantes de Institutos</h5>
                            <p class="card-text">Ver Listas de estudiantes designados de los diferentes Institutos.</p>
                            <a href="{{ route('list_student_institute') }}" class="btn btn-success start_load_url">Ver Listas</a>
                            </div>
                        </div>
                    </center>
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