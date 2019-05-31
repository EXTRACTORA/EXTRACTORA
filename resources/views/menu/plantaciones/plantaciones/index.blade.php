<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.plantaciones.barra_plantacion') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.plantaciones') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		{{ Form::open(array('route' => 'plantaciones.store','id' =>'form-store-plantaciones','method' => 'POST' )) }}
			@include('menu.plantaciones.plantaciones.forms.contenidoformulario')
		{{ Form::close() }}	
	</div>

	@include('ayudas.ayuda_plantaciones')
	{{-- create  --}}
	{{ Form::open(array('route' => 'plantaciones.create','id' =>'form-create-plantaciones','method' => 'GET' )) }}{{ Form::close() }}
	{{-- edit  --}}
	{{ Form::open(array('route' => ['plantaciones.edit',':ID'],'id' =>'form-edit-plantaciones','method' => 'GET
	' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['plantaciones.update',':ID'],'id' =>'form-update-plantaciones','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['plantaciones.destroy',':ID'],'id' =>'form-deletes-plantaciones','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/plantaciones/plantaciones.js')!!}
	@show
