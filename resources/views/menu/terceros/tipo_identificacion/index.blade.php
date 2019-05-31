<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.terceros.barra_tipo_identificacion') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.tipo_identificacion') }}</h3>		
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'tipo_identificaciones.store','id' =>'form-store-tipo_identificaciones','method' => 'POST' )) }}
			@include('menu.terceros.tipo_identificacion.forms.contenidoformulario')
			{{ Form::close() }}	
		</div>
	</div>
	@include('ayudas.ayuda_tipo_identificaciones')
	{{-- create  --}}
	{{ Form::open(array('route' => 'tipo_identificaciones.create','id' =>'form-create-tipo_identificaciones','method' => 'GET' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['tipo_identificaciones.update',':ID'],'id' =>'form-update-tipo_identificaciones','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['tipo_identificaciones.destroy',':ID'],'id' =>'form-deletes-tipo_identificaciones','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/terceros/tipo_identificaciones.js')!!}
	@show
