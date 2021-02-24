@component('components.show_card')
    @slot('title')
		Datos de la Designacion del Estudiante
    @endslot    
    @slot('bodycard')    
        <div class="row">
            <div class="col-md-12">                    
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="" alt="">
                            </div>
                            <div class="col-md-8">    
                                <table class="table align-items-center table-flush">
                                    <tbody>
                                        <tr>
                                            <td><label>Nombre Estudiante:</label></td>
                                            <td>{{ $show_student_view->name }} {{ $show_student_view->ap_pat }} {{ $show_student_view->ap_mat }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>Cedula de Identidad:</label></td>
                                            <td>{{ $show_student_view->ci }} {{ $show_student_view->exp }}.</td>
                                        </tr>
                                        <tr>
                                            <td><label>Genero:</label></td>
                                            <td>{{ $show_student_view->sexo }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>Correo Electronico:</label></td>
                                            <td>{{ $show_student_view->correo }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>Celular:</label></td>
                                            <td>{{ $show_student_view->celular }}</td>
                                        </tr>
                                        <tr>
                                            <td><label>Direccion:</label></td>
                                            <td>{{ $show_student_view->direccion }}</td>
                                        </tr>
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Datos de la Designacion</h6>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-1"></div>                          
                            <div class="col-md-5">                                
                                <div class="datos">
                                    <label for="" class="text-primary">Centro Medico designado: </label> <text>{{ $show_student_view->name_estable_salud}}</text>
                                </div>
                                <div class="datos">
                                    <label for="" class="text-primary">Fecha Inicio Internado: </label> <text>{{ $show_student_view->created_at}}</text>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="datos">
                                    <label for="" class="text-primary">Fecha y hora Designacion: </label> <text>{{ $show_student_view->created_at}}</text>                                    
                                </div>
                                <div class="datos">
                                    <label for="" class="text-primary">Fecha Fin Internado: </label> <text>{{ $show_student_view->created_at}}</text>
                                </div>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-success btn-xs" target="_blank" href="{{ route('report_certification',$show_student_view->id) }}"> <span class="glyphicon glyphicon-print"></span> Imprimir Certificacion</a>                                
                                <a class="btn btn-primary btn-xs" target="_blank" href="{{ route('report_memorandum',$show_student_view->id) }}"> <span class="glyphicon glyphicon-print"></span> Imprimir Memorandum</a>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	@endslot
	@slot('action')
		@can('tecnico_sedes')
			<button href="{{ route('index_internship_draw') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<style>
    .datos{
    
    }
</style>