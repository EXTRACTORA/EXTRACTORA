

<div class="box box-success">
	<div class="box-header with-border padin-box-header">
		
		<div class="row">
			<div class="col-lg-12 mb-5">


				<button onclick="newCalidadfrutaCampo();" id="btnCrearPlantacion" title="Guardar y nueva inspeccion" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i></button>				

				{!!link_to_route('plantaciones.index',$title = '',null,$attributes = ['class'=>'btn btn-default glyphicon glyphicon-log-out','id'=>'btnCancelarCalidadfrutacampo'])!!}		
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">Ejemplo peticiones Ajax</h3>

		</div>

	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">

		<div class="container-fluid spark-screen">
			<div class="row">
				<div class="col-md-12">



					{{-- index --}}
					{{ Form::open(array('route' => 'metodosAjax.index','id' =>'form-index','method' => 'GET' )) }}{{ Form::close() }}
					{{-- create --}}
					{{ Form::open(array('route' => 'metodosAjax.create','id' =>'form-create','method' => 'GET' )) }}{{ Form::close() }}
					{{-- show --}}
					{{ Form::open(array('route' => ['metodosAjax.show',':ID'],'id' =>'form-show','method' => 'GET' )) }}
					{{ Form::close() }}
					{{-- delete --}}
					{{ Form::open(array('route' => ['metodosAjax.destroy',':ID'],'id' =>'form-deletes','method' => 'DELETE' )) }}
					{{ Form::close() }}
					{{-- edit --}}
					{{ Form::open(array('route' => ['metodosAjax.edit',':ID'],'id' =>'form-edit','method' => 'GET' )) }}
					{{ Form::close() }}


					<button type="button" class="btn btn-primary" id="ajax" onclick="index()">Ajax INDEX</button>
					<button type="button" class="btn btn-primary" id="ajax" onclick="create()">Ajax CREATE</button>	
					<button type="button" class="btn btn-primary" id="ajax" onclick="show('85')">Ajax SHOW</button>
					<button type="button" class="btn btn-primary" id="ajax" onclick="deletes('90')">Ajax DELETE</button>
					<button type="button" class="btn btn-primary" id="ajax" onclick="edit('95')">Ajax EDIT</button>
					<br/>
					<br/>
					{{-- store --}}
					{{ Form::open(array('route' => 'metodosAjax.store','id' =>'form-store','method' => 'POST' )) }}
					<div class="form-group">
						<label for="formGroupExampleInput">Ejemplo de STORE</label>
						<input type="text" class="form-control" name="texto_store" placeholder="Example input">
						
					</div>
					<button type="button" class="btn btn-primary" id="ajax" onclick="store()">Ajax STORE</button>
					{{ Form::close() }}
					<br/>
					{{-- update --}}
					{{ Form::open(array('route' => ['metodosAjax.update',':ID'],'id' =>'form-update','method' => 'PUT' )) }}
					<div class="form-group">
						<label for="formGroupExampleInput">Ejemplo de UPDATE</label>
						<input type="text" class="form-control" name="texto_update" placeholder="Example input">
						
					</div>
					<button type="button" class="btn btn-primary" id="ajax" onclick="update('89')">Ajax UPDATE</button>
					{{ Form::close() }}






				</div>
			</div>
		</div>
	</div>

	
</div>







