@component('components.create_card')
    @slot('title')
		Registrar Nuevo Estudiantes
    @endslot    
	@slot('bodycard')
	<form  action="{{ route('store_students') }}" method="POST" class="save_date"> 
		@csrf  
		<div class="row">
			<div class="col-md-12">
				<div class="card-body">
					<div class="text-center">
						<h6 class="card-title text-success"></i> DATOS GENERALES DEL ESTUDIANTE</h6> <hr>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="name_student">NOMBRES</label>
								<input type="text" class="change_select form-control name_form" name="name_student" placeholder="Ingrese Nombres del Estudiante">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_paterno">APELLIDO PATERNO</label>
								<input type="text" class="change_select form-control name_form" name="a_paterno" placeholder="Ingrese Apellido Paterno">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="a_materno">APELLIDO MATERNO</label>
								<input type="text" class="change_select form-control name_form" name="a_materno" placeholder="Ingrese Apellido Materno">
								<small class="text-danger" id=""></small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="ci">CARNET DE IDENTIDAD</label>
								<input type="text" class="form-control name_form" name="ci" placeholder="Ej. 12404567">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
							<label for="exp">EXP</label>
								<select class="custom-select" name="exp">
									<option>Pt</option>
									<option>Lp</option>
									<option>Tj</option>
									<option>Sc</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="date">FECHA DE NACIMIENTO</label>
								<input type="date" class="form-control name_form" name="birth_date">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="genero">SEXO</label>
							<select class="custom-select" name="genero" >
								<option>MASCULINO</option>
								<option>FEMENINO</option>
							</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="phone">TELEFONO</label>
								<input type="numeric" class="change_select form-control name_form" name="phone" placeholder="Ejm. 60242367">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="addrees">DIRECCION</label>
								<input type="text" class="change_select form-control name_form" name="addrees" placeholder="Ingrese su Direccion">
								<small class="text-danger" id=""></small>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="email">CORREO</label>
								<input type="email" class="form-control name_form" name="email" placeholder="ejemplo@gmail.com">
								<small class="text-danger" id=""></small>
							</div>
						</div>
					</div>
					<input type="hidden" name="type_uni_inst" value="universidad">
					<div class="text-center">
						<h6 class="card-title text-success"></i> PERIODOS HABILITADOS PARA REGISTRO</h6> <hr>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<small class="text-danger" id="id_periodo"></small>
							<table id="example" class="table align-items-center table-flush">
								<thead>
									<tr>
										<th>GESTION</th>
										<th>PERIDO</th>
										<th>OPCION</th>
									</tr>
								</thead>
								<tbody>
									@forelse($periodo_habilitados as $ph)
										<tr>
											<td> {{ $ph->gestion }} </td>
											<td> {{ $ph->period }} </td>
											<td>
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio{{ $ph->id }}" name="id_periodo" value="{{ $ph->id }}" class="custom-control-input change_select">
													<label class="custom-control-label" for="customRadio{{ $ph->id }}"></label>
												</div>
											</td>
										</tr>
									@empty
										<tr>
											<td>No Existen fechas habilitadas para registro</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-header">
						<div class="text-center">
							<h6 class="card-title text-success"></i> DATOS CENTRO DE LA INSTITUCION EDUCATIVA</h6> <hr>
						</div>
						<div class="card-tools text-right">
							<button type="button" class="btn btn-outline-primary btn-sm load_uni_student">
								Universidad
							</button>
							<button type="button" class="btn btn-outline-success btn-sm load_inti_student">
								Insitutos
							</button>
						</div>
					</div>
					<div class="card-body">
						<h6 class="card-title text-danger message_load" id="error_choose_education_center">
								<code> Seleccione el tipo de Institucion Educativa</code>
						</h6>
						<div id="load_uni_inti"></div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-primary">Guardar</button>				
							<button type="reset" class="btn btn-danger">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	@endslot
	@slot('action')
		@can('estudiantes.index')
			<button href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>