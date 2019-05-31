<div class="panel panel-default">
	<div style="padding: 15px;">
		<div class="row">
			<div class="col-md-6">


				
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Codigo</label>
					<div class="col-sm-2">
						<input name="codigo" id="codigo_tercero" class="form-control" type="text" autocomplete="off" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Primer nombre</label>
					<div class="col-sm-8">
						<input value="jeison" name="nombre1" id="nombre_tercero" class="form-control" type="text" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Segundo nombre</label>
					<div class="col-sm-8">
						<input value="antonio" name="nombre2" id="segundo_nombre_tercero" class="form-control" type="text" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Primer apellido</label>
					<div class="col-sm-8">
						<input value="diaz" name="apellido1" id="primer_apellido_tercero" class="form-control" type="text" autocomplete="off">
					</div>
				</div>

				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Segundo apellido</label>
					<div class="col-sm-8">
						<input value="palmera" name="apellido2" id="segundo_apellido_tercero" class="form-control" type="text" autocomplete="off">
					</div>
				</div>				
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<div class="input-group">
						{{-- 	<input type="text" id="tipo_identificacion_tercero" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<a href="javascript:void(0)"  onclick="buscar_tipo_identificaciones('terceros')" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
							</span> --}}             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Tipo identificacion</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" id="tipo_identificacion_tercero" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<a href="javascript:void(0)"  onclick="buscar_tipo_identificaciones('terceros')" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Nit</label>
					<div class="col-sm-4">
						<input value="844457625" name="nit" id="nit_tercero" class="form-control" type="text" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="MainContent_text_reg_telefono" class="control-label">Digito de Verificacion</label>
						<div class="col-sm-2">
							<input value="9" name="codigo_verificacion" id="codigo_verificacion_tercero" class="form-control" type="text" autocomplete="off">
						</div>
					</div>				
				</div>			
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Actividad economica</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" id="actividad_economica_tercero" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<a href="javascript:void(0)"  onclick="buscar_actividad_economica('terceros')" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Activo</label>
					<div class="col-sm-8">
						<input class="big-checkbox" id="check_estado_tercero" type="checkbox" name="estado[]" value="" checked="true">
					</div>
				</div>
				
				{{-- <input class="big-checkbox" id="check_{{$ingredientes_all->id}}" type="checkbox" name="ingredientes[]" value="{{$ingredientes_all->id}}" > --}}

 				{{-- <div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Codigo verificacion</label>
					<div class="col-sm-4">
						<input name="codigo_verificacion" id="codigo_verificacion_tercero" class="form-control" type="text" autocomplete="off">
					</div>
				</div> --}}

			</div>
		</div>
	</div>

</div>

<div class="panel panel-default">
	<div style="padding: 30px;">
		<div class="row">
			<div id="tabs-contacto" style="height: 300px;">
				<ul>				
					<li><a href="#tabs-1">Direccion</a></li>
					<li><a href="#tabs-2">contacto</a></li>
					<li><a href="#tabs-5">Notas</a></li>
				</ul>				
				<div id="tabs-1">
					<div class="form-group">
						<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Direccion</label>
						<div class="col-sm-4">
							<input value="mz b casa 22 villamonica" name="direccion" id="direccion_tercero" class="form-control" type="text" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Pais</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" id="paises_tercero" class="form-control" autocomplete="off">
								<span class="input-group-btn">
									<a href="javascript:void(0)"  onclick="buscar_paises()" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
								</span>             
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Departamento</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" id="departamentos_tercero" class="form-control" autocomplete="off">
								<span class="input-group-btn">
									{{-- <button class="btn btn-default fa fa-plus" type="button"></button> --}}
									<a href="javascript:void(0)"  onclick="buscar_departamentos()" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
								</span>              
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Ciudad</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" id="ciudades_tercero" class="form-control" autocomplete="off">
								<span class="input-group-btn">
									<a href="javascript:void(0)"  onclick="buscar_ciudades()" title="Adicionar" class="btn barra"><span class="fa fa-search"></span></a>
								</span>             
							</div>
						</div>
					</div>
				</div>
				<div id="tabs-2" >	
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Telefonos</h3>
								</div>
								<div class="panel-body">

									@include('menu.barras.terceros.barra_tercero_telefono') 
									<br/>
									<div style="height: 100px;  overflow-y: scroll;overflow-x: hidden;">

										<table id="tblAppendGrid-telefono" class="table"></table>						
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Correos</h3>
								</div>
								<div class="panel-body">
									@include('menu.barras.terceros.barra_tercero_correo') 
									<br/>
									<div style="height: 100px;  overflow-y: scroll;overflow-x: hidden;">
										<table id="tblAppendGrid-correo" class="table"></table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div id="tabs-5" >
					<br/>
					<div class="form-group">
						<label for="MainContent_text_reg_email" class="col-sm-1 control-label">Descripcion</label>
						<div class="col-sm-10">
							{{  Form::textarea('descripcion',"este es un descripcion",['class'=>'form-control', 'rows' => 8, 'cols' => 12,'id'=>'descripcion_tercero'])  }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	



	{{-- input ocultos --}}
	<input name="pais_id" type="hidden" id="id_paises_tercero">
	<input name="departamento_id" type="hidden" id="id_departamentos_tercero">
	<input name="ciudad_id" type="hidden" id="id_ciudades_tercero">
	<input name="tipo_identificacion_id" type="hidden" id="id_tipo_identificacion_tercero">
	<input name="actividad_economica_id" type="hidden" id="id_actividad_economica_tercero">

