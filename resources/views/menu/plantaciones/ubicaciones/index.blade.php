<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.plantaciones.barra_ubicacion') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.ubicaciones') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'ubicaciones.store','id' =>'form-store-ubicaciones','method' => 'POST' )) }}
			@include('menu.plantaciones.ubicaciones.forms.contenidoformulario')
			{{ Form::close() }}	
		</div>
	</div>
	@include('menu.plantaciones.ubicaciones.modal.modal_ubicaciones')
	@include('ayudas.ayuda_ubicaciones')
	{{-- create  --}}
	{{ Form::open(array('route' => 'ubicaciones.create','id' =>'form-create-ubicaciones','method' => 'GET' )) }}{{ Form::close() }}		
	{{-- updates --}}
	{{ Form::open(array('route' => ['ubicaciones.update',':ID'],'id' =>'form-update-ubicaciones','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['ubicaciones.destroy',':ID'],'id' =>'form-deletes-ubicaciones','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/plantaciones/ubicaciones.js')!!}
	@show
