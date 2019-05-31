<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.terceros.barra_tercero') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.terceros') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">	
	{{-- store  --}}
	{{ Form::open(array('route' => 'terceros.store','id' =>'form-store-terceros','method' => 'POST' )) }}		
		@include('menu.terceros.terceros.forms.contenidoformulario')
		{{ Form::close() }}	
	</div>

	@include('ayudas.ayuda_terceros')


	
	

	{{-- create  --}}
	{{ Form::open(array('route' => 'terceros.create','id' =>'form-create-terceros','method' => 'GET' )) }}{{ Form::close() }}
	{{-- edit  --}}
	{{ Form::open(array('route' => ['terceros.edit',':ID'],'id' =>'form-edit-terceros','method' => 'GET
	' )) }}{{ Form::close() }}
	{{-- update  --}}
	{{ Form::open(array('route' => ['terceros.update',':ID'],'id' =>'form-update-terceros','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['terceros.destroy',':ID'],'id' =>'form-deletes-terceros','method' => 'DELETE' )) }}{{ Form::close() }}
	@section('scripts')		
	{!!Html::script('js/terceros/terceros.js')!!}
	
	@show
