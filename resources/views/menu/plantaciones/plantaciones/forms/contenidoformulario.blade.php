<div class="panel panel-default">
	<div style="padding-top: 15px;">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Codigo</label>
					<div class="col-sm-2">
						<input name="codigo" id="codigo_plantacion" class="form-control" type="text" autocomplete="off" readonly>
					</div>
				</div>		
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Nombre</label>
					<div class="col-sm-8">
						<input name="nombre" id="nombre_plantacion" class="form-control" type="text" autocomplete="off">
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Fecha balance M.</label>
					<div class="col-sm-8">
						<input name="nombre" id="nombre_plantacion" class="form-control" type="text" autocomplete="off">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
{{-- -------------------------------------------------------Tercero --}}
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tercero</h3>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Propietario</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Encargado</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">A quien factura</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<button class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- -------------------------------------------------------Localizacion --}}	
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Localizacion</h3>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Zona</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" id="txt_plantacion_zona" autocomplete="off">
							<span class="input-group-btn">
								<button onclick="buscar_zonas('plantaciones');" class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Grupo</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" class="form-control" id="txt_plantacion_grupo" autocomplete="off">
							<span class="input-group-btn">
								<button onclick="buscar_grupos('plantaciones')" class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="MainContent_text_reg_telefono" class="col-sm-3 control-label">Ubicacion</label>
					<div class="col-sm-8">
						<div class="input-group">
							<input type="text" id="txt_plantacion_ubicacion" class="form-control" autocomplete="off">
							<span class="input-group-btn">
								<button onclick="buscar_ubicaciones('plantaciones')" class="btn btn-default fa fa-search" type="button"></button>
							</span>             
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- input ocultos --}}
<input name="zona_id" type="hidden" id="txt_plantacion_id_zona">
<input name="grupo_id" type="hidden" id="txt_plantacion_id_grupo">
<input name="ubicacion_id" type="hidden" id="txt_plantacion_id_ubicacion">
{{-- terceros --}}
<input name="_id" type="hidden" id="txt_plantacion_id_">
<input name="_id" type="hidden" id="txt_plantacion_id_">
<input name="_id" type="hidden" id="txt_plantacion_id_">
<input name="users_id" type="hidden" value="{{Auth::user()->id}}">

