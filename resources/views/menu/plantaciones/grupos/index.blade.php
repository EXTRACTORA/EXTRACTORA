<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.plantaciones.barra_grupo') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.grupos') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'grupos.store','id' =>'form-store-grupos','method' => 'POST' )) }}
				 @include('menu.plantaciones.grupos.forms.contenidoformulario') 
			{{ Form::close() }}	
		</div>
	</div>

	@include('ayudas.ayuda_grupos')
	{{-- create  --}}
	{{ Form::open(array('route' => 'grupos.create','id' =>'form-create-grupos','method' => 'GET' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['grupos.update',':ID'],'id' =>'form-update-grupos','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['grupos.destroy',':ID'],'id' =>'form-deletes-grupos','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/plantaciones/grupos.js')!!}
	@show
