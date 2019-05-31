<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.terceros.barra_actividad_economica') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.actividad_economica') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'actividad_economicas.store','id' =>'form-store-actividad_economicas','method' => 'POST' )) }}
			@include('menu.terceros.actividad_economicas.forms.contenidoformulario')
			{{ Form::close() }}	
		</div>
	</div>
	@include('ayudas.ayuda_actividad_economicas')
	{{-- create  --}}
	{{ Form::open(array('route' => 'actividad_economicas.create','id' =>'form-create-actividad_economicas','method' => 'GET' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['actividad_economicas.update',':ID'],'id' =>'form-update-actividad_economicas','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['actividad_economicas.destroy',':ID'],'id' =>'form-deletes-actividad_economicas','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/terceros/actividad_economicas.js')!!}
	@show
