<div class="form-group">
	<label for="documento" class="col-md-4 control-label">Nombre</label>

	<div class="col-md-6">
		{{ Form::text('nombre', null, array('placeholder' => 'Ingrese nombre','class' => 'form-control','required','autofocus')) }}
	</div>
</div>
<div class="form-group">
	<label for="" class="col-md-4 control-label">Descripcion</label>
	<div class="col-md-6">
		{{  Form::textarea('descripcion',null,['class'=>'form-control', 'rows' => 4, 'cols' => 10,'id'=>'observaciones'])  }}
	</div>
</div>