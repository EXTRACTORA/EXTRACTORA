@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection

{{-- @section('contentheader_title')
menu
@endsection --}}

@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12">

			<div class="nth-tabs" id="main-tabs">
			</div>

		</div>			

	</div>
</div>
<!--  -----------------------------------------------usuarios----------------------------------------------------- -->
{{-- index perfiles --}}
{{ Form::open(array('route' => 'perfiles.index','id' =>'form-index-perfiles','method' => 'GET' )) }}{{ Form::close() }}
{{-- index permisos --}}
{{ Form::open(array('route' => 'permisos.index','id' =>'form-index-permisos','method' => 'GET' )) }}{{ Form::close() }}
{{-- usuarios --}}
{{ Form::open(array('route' => 'usuarios.index','id' =>'form-index-usuarios','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------plantaciones-----------------------------------------------------> 
{{-- index grupos --}}
{{ Form::open(array('route' => 'grupos.index','id' =>'form-index-grupos','method' => 'GET' )) }}{{ Form::close() }}
{{-- index zonas --}}
{{ Form::open(array('route' => 'zonas.index','id' =>'form-index-zonas','method' => 'GET' )) }}{{ Form::close() }}
{{-- index ubicaciones --}}
{{ Form::open(array('route' => 'ubicaciones.index','id' =>'form-index-ubicaciones','method' => 'GET' )) }}{{ Form::close() }}
{{-- index plantaciones --}}
{{ Form::open(array('route' => 'plantaciones.index','id' =>'form-index-plantaciones','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------vehiculos-----------------------------------------------------> 
{{-- index tipo_vehiculos --}}
{{ Form::open(array('route' => 'tipo_vehiculos.index','id' =>'form-index-tipo_vehiculos','method' => 'GET' )) }}{{ Form::close() }}
{{-- index vehiculos --}}
{{ Form::open(array('route' => 'vehiculos.index','id' =>'form-index-vehiculos','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------productos-----------------------------------------------------> 
{{-- index clases_productos --}}
{{ Form::open(array('route' => 'clases_productos.index','id' =>'form-index-clases_productos','method' => 'GET' )) }}{{ Form::close() }}
{{-- index productos --}}
{{ Form::open(array('route' => 'productos.index','id' =>'form-index-productos','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------terceros-----------------------------------------------------> 
{{-- index tipo_terceros --}}
{{ Form::open(array('route' => 'tipo_terceros.index','id' =>'form-index-tipo_terceros','method' => 'GET' )) }}{{ Form::close() }}
{{-- index terceros --}}
{{ Form::open(array('route' => 'terceros.index','id' =>'form-index-terceros','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------paradas-----------------------------------------------------> 
{{-- index tipo_paradas --}}
{{ Form::open(array('route' => 'tipo_paradas.index','id' =>'form-index-tipo_paradas','method' => 'GET' )) }}{{ Form::close() }}
{{-- index paradas --}}
{{ Form::open(array('route' => 'paradas.index','id' =>'form-index-paradas','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------equipos-----------------------------------------------------> 
{{-- index fases_proceso --}}
{{ Form::open(array('route' => 'fases_proceso.index','id' =>'form-index-fases_proceso','method' => 'GET' )) }}{{ Form::close() }}
{{-- index equipos --}}
{{ Form::open(array('route' => 'equipos.index','id' =>'form-index-equipos','method' => 'GET' )) }}{{ Form::close() }}
<!--  ----------------------------------------------generales-----------------------------------------------------> 
{{-- index unidades_medida --}}
{{ Form::open(array('route' => 'unidades_medida.index','id' =>'form-index-unidades_medida','method' => 'GET' )) }}{{ Form::close() }}
{{-- index division_geografica --}}
{{ Form::open(array('route' => 'division_geografica.index','id' =>'form-index-division_geografica','method' => 'GET' )) }}{{ Form::close() }}
{{-- index tipos_identificacion --}}
{{ Form::open(array('route' => 'tipos_identificacion.index','id' =>'form-index-tipos_identificacion','method' => 'GET' )) }}{{ Form::close() }}
@endsection
{{-- @include('ajax.ajax') --}}
{{-- @include('ajax.ajaxplantaciones.plantaciones.index') --}}

