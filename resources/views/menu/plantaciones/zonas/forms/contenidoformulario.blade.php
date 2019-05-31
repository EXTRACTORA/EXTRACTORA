<div style="padding-top: 15px;">
	<div class="form-group">
		<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Codigo</label>
		<div class="col-sm-1">
			<input name="codigo" id="codigo_zona" class="form-control" type="text" autocomplete="off" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="MainContent_text_reg_telefono" class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-4">
			<input name="nombre" id="nombre_zona" class="form-control" type="text" autocomplete="off">
		</div>
	</div>
	<div class="form-group">
		<label for="MainContent_text_reg_email" class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-4">
			{{  Form::textarea('descripcion',null,['class'=>'form-control', 'rows' => 4, 'cols' => 10,'id'=>'descripcion_zona'])  }}
		</div>
	</div>
</div>