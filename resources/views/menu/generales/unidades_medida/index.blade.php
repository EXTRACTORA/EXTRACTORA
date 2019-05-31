<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.generales.unidades_medida') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.unidades_medida') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">	
			{{ Form::open(array('route' => 'unidades_medida.store','id' =>'form-store-unidades_medidas','method' => 'POST' )) }}
				@include('menu.generales.unidades_medida.forms.contenidoformulario') 
			{{ Form::close() }}	
		</div>
	</div>
	@include('menu.generales.unidades_medida.modal.modal_unidades_medidas')
	@include('ayudas.ayuda_unidades_medidas')
	{{-- create  --}}
	{{ Form::open(array('route' => 'unidades_medida.create','id' =>'form-create-unidades_medidas','method' => 'GET' )) }}{{ Form::close() }}
	{{-- edit  --}}
	{{ Form::open(array('route' => ['unidades_medida.edit',':ID'],'id' =>'form-edit-unidades_medidas','method' => 'GET
	' )) }}{{ Form::close() }}
	{{-- show  --}}
	{{ Form::open(array('route' => ['unidades_medida.show',':ID'],'id' =>'form-show-unidades_medidas','method' => 'GET
	' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['unidades_medida.update',':ID'],'id' =>'form-update-unidades_medidas','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['unidades_medida.destroy',':ID'],'id' =>'form-deletes-unidades_medidas','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')
	{!!Html::script('js/generales/unidad_medidas.js')!!}
	@show
