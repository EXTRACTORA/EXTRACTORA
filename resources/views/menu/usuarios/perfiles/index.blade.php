<div class="box box-success">
	<div class="box-header with-border padin-box-header">		
		<div class="row">
			<div class="col-lg-12 mb-5">
				@include('menu.barras.usuarios.barra_perfil') 	
			</div>
		</div>
		<div class="box-tools pull-right">	
			<h3 class="box-title">{{ trans('adminlte_lang::menu.perfiles') }}</h3>			
		</div>
	</div><!-- /.box-header -->
	<div class="box-body form-horizontal">
		<div class="panel panel-default">
			{{ Form::open(array('route' => 'perfiles.store','id' =>'form-store-perfiles','method' => 'POST' )) }}
			@include('menu.usuarios.perfiles.forms.contenidoformulario')
			{{ Form::close() }}	
		</div>
	</div>
	@include('ayudas.ayuda_perfiles')
	{{-- create  --}}
	{{ Form::open(array('route' => 'perfiles.create','id' =>'form-create-perfiles','method' => 'GET' )) }}{{ Form::close() }}	
	{{-- update  --}}
	{{ Form::open(array('route' => ['perfiles.update',':ID'],'id' =>'form-update-perfiles','method' => 'PUT' )) }}
	{{ Form::close() }}
	{{-- delete --}}
	{{ Form::open(array('route' => ['perfiles.destroy',':ID'],'id' =>'form-deletes-perfiles','method' => 'DELETE' )) }}{{ Form::close() }}
	{{-- scripts --}}
	@section('scripts')
	{!!Html::script('js/usuarios/perfiles.js')!!}
	@show

