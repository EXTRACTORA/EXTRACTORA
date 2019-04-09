<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<div id="inner"><p id="demo"></p></div>

		<div class="form-group">		
			{{ Form::text('nombre', null, array('placeholder' => 'Nombre de la plantacion', 'id' => 'txtPlantacion','class' => 'form-control','required')) }}	
		</div>
		<div class="form-group">	
			<select name="zona_id" class="form-control" id="select_zona"> 
				<option value="0" disabled selected hidden>Seleccione una zona...</option>
				@foreach($zonas as $zona)
				<option value="{{ $zona->id }}">{{ $zona->nombre }}</option>	
				@endforeach
			</select>	
		</div>	
		<div class="form-group">	
			<select name="grupo_id" class="form-control" id="select_grupo"> 
				<option value="0" disabled selected hidden>Seleccione un grupo...</option>
				@foreach($grupos as $grupo)
				<option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>	
				@endforeach
			</select>	
		</div>
		<div class="form-group">		
			<select name="ubicacion_id" class="form-control" id="select_ubicacion">
				<option value="0" disabled selected hidden>Seleccione una ubicacion...</option> 
				@foreach($ubicaciones as $ubicacion)
				<option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option>	
				@endforeach
			</select>
		</div>
	</div><!-- /.col-lg-4 -->
</div><!-- /.row -->