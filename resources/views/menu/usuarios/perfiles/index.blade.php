<div class="box box-success">
	<div class="box-header with-border padin-box-header">
		
		<div class="row">
			<div class="col-lg-12 mb-5">

				@include('menu.barras.usuarios.barra_perfil') 
			{{-- 	<button onclick="newCalidadfrutaCampo();" id="btnCrearPlantacion" title="Guardar y nueva inspeccion" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i></button>				

				{!!link_to_route('perfiles.index',$title = '',null,$attributes = ['class'=>'btn btn-default glyphicon glyphicon-log-out','id'=>'btnCancelarCalidadfrutacampo'])!!}	 --}}	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">Perfiles</h3>
			
		</div>
		{{-- <img src="img/loading.gif"> --}}
		<!-- /.box-tools -->
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">


		<div class="col-sm-6">
			<div class="form-group">
				<label for="MainContent_text_reg_nombre" class="col-sm-4 control-label">Codigo:</label>
				<div class="col-sm-8">
					<input name="codigo_perfil" id="" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label for="MainContent_text_reg_telefono" class="col-sm-4 control-label">Nombre</label>
				<div class="col-sm-8">
					<input name="nombre_perfil" id="nombre_perfil" class="form-control" type="text">
				</div>
			</div>
			<div class="form-group">
				<label for="MainContent_text_reg_email" class="col-sm-4 control-label">Descripcion</label>
				<div class="col-sm-8">
					<input name="descripcion_perfil" id="descripcion_perfil" class="form-control" type="text">
				</div>
			</div>
			
		</div>
		<div class="col-sm-6">
	

	@include('menu.usuarios.perfiles.modal.modal_perfiles') 
		</div>
	</div>



