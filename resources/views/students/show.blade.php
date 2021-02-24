@component('components.show_card')
    @slot('title')
		Datos Estudiante
    @endslot    
    @slot('bodycard')
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <img src="" alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-6 col-md-8">
            <h4>{{ $student->name.' '.$student->ap_pat.' '.$student->ap_mat }}</h4>   
            <div class="table-responsive p-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Numero CI.:</th>
                            <td>{{ $student->ci.' '.$student->exp }}</td>
                        </tr>   
                        <tr>
                            <th style="width:50%">Fecha Nacimiento:</th>
                            <td>{{ $student->birth_date }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Correo Electronico:</th>
                            <td>{{ $student->correo }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Celular:</th>
                            <td>{{ $student->celular }}</td>
                        </tr>                        
                        <tr>
                            <th style="width:50%">Direccion:</th>
                            <td>{{ $student->birth_date }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Genero:</th>
                            <td>{{ $student->sexo }}</td>
                        </tr>      
                    </tbody>
                </table>
            </div>         
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h5 class="m-0 text-primary">Datos de Estudio</h5>
            <div class="table-responsive p-3">
                <table class="table">
                    @if($student->carrer_id <> 1)
                    <tbody>
                        <tr>
                            <th style="width:50%">Carrera</th>
                            <td>{{ $student->name_career }}</td>
                        </tr>  
                        <tr>
                            <th style="width:50%">Cacultad:</th>
                            <td>{{ $student->name_faculty }}</td>
                        </tr>   
                        <tr>
                            <th style="width:50%">Universidad:</th>
                            <td>{{ $student->name_university }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Municipio:</th>
                            <td>{{ $student->name_municipality }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Provincia:</th>
                            <td>{{ $student->name_province }}</td>
                        </tr>                        
                        <tr>
                            <th style="width:50%">Departamento:</th>
                            <td>{{ $student->name_depart }}</td>
                        </tr>       
                    </tbody>
                    @elseif($student->insti_id <> 1)
                    <tbody>
                        <tr>
                            <th style="width:50%">Carrera:</th>
                            <td>{{ $student->name_career }}</td>
                        </tr>   
                        <tr>
                            <th style="width:50%">Instituto:</th>
                            <td>{{ $student->name_institute }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Municipio:</th>
                            <td>{{ $student->name_municipality }}</td>
                        </tr>    
                        <tr>
                            <th style="width:50%">Provincia:</th>
                            <td>{{ $student->name_province }}</td>
                        </tr>                        
                        <tr>
                            <th style="width:50%">Departamento:</th>
                            <td>{{ $student->name_depart }}</td>
                        </tr>      
                    </tbody>
                    @endif
                </table>
            </div>    
        </div>
    </div>
	@endslot
	@slot('action')
		@can('tecnico_sedes')
			<button href="{{ route('index_students') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent