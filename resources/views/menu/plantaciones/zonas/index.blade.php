<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.plantaciones.barra_zona') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.zonas') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'zonas.store','id' =>'form-store-zonas','method' => 'POST' )) }}
			@include('menu.plantaciones.zonas.forms.contenidoformulario')
			{{ Form::close() }}	
		</div>
	</div>
	@include('ayudas.ayuda_zonas')
	{{-- create  --}}
	{{ Form::open(array('route' => 'zonas.create','id' =>'form-create-zonas','method' => 'GET' )) }}{{ Form::close() }}
	{{-- edit  --}}
{{-- 	{{ Form::open(array('route' => ['zonas.edit',':ID'],'id' =>'form-edit-zonas','method' => 'GET
	' )) }}{{ Form::close() }} --}}
	{{-- show  --}}
	{{-- {{ Form::open(array('route' => ['zonas.show',':ID'],'id' =>'form-show-zonas','method' => 'GET
	' )) }}{{ Form::close() }} --}}
	{{-- update  --}}
	{{ Form::open(array('route' => ['zonas.update',':ID'],'id' =>'form-update-zonas','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['zonas.destroy',':ID'],'id' =>'form-deletes-zonas','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/plantaciones/zonas.js')!!}
	@show
