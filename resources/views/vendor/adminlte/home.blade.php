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
			<div id="main-modales">
			</div>
		</div>
	</div>	
</div>


{{-- show --}}
{{ Form::open(array('route' => ['ciudades.show',':ID'],'id' =>'form-show-ciudades','method' => 'GET
' )) }}{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['ciudades.edit',':ID'],'id' =>'form-edit-ciudades','method' => 'GET
' )) }}{{ Form::close() }}
{{-- index --}}
{{ Form::open(array('route' => 'ciudades.index','id' =>'form-index-ciudades','method' => 'GET' )) }}{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['departamentos.show',':ID'],'id' =>'form-show-departamentos','method' => 'GET
' )) }}{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['departamentos.edit',':ID'],'id' =>'form-edit-departamentos','method' => 'GET
' )) }}{{ Form::close() }}
{{-- index --}}
{{ Form::open(array('route' => 'departamentos.index','id' =>'form-index-departamentos','method' => 'GET' )) }}{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['paises.edit',':ID'],'id' =>'form-edit-paises','method' => 'GET
' )) }}{{ Form::close() }}
{{-- index --}}
{{ Form::open(array('route' => 'paises.index','id' =>'form-index-paises','method' => 'GET' )) }}{{ Form::close() }}
{{-- index --}}
{{ Form::open(array('route' => 'departamentos.index','id' =>'form-index-departamentos','method' => 'GET' )) }}{{ Form::close() }}
{{-- index --}}
{{ Form::open(array('route' => 'ciudades.index','id' =>'form-index-ciudades','method' => 'GET' )) }}{{ Form::close() }}
{{--------------------------------------------- terceros -----------------------------------------------}}
{{-- index --}}
{{ Form::open(array('route' => 'terceros.index','id' =>'form-index-terceros','method' => 'GET' )) }}{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['terceros.edit',':ID'],'id' =>'form-edit-terceros','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['terceros.show',':ID'],'id' =>'form-show-terceros','method' => 'GET
' )) }}{{ Form::close() }}

{{--------------------------------------------- perfiles -----------------------------------------------}}
{{-- index--}}
{{ Form::open(array('route' => 'perfiles.index','id' =>'form-index-perfiles','method' => 'GET' )) }}
{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['perfiles.edit',':ID'],'id' =>'form-edit-perfiles','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['perfiles.show',':ID'],'id' =>'form-show-perfiles','method' => 'GET
' )) }}{{ Form::close() }}

{{---------------------------------------------actividad_economica -----------------------------------------------}}
{{-- index --}}
{{ Form::open(array('route' => 'actividad_economicas.index','id' =>'form-index-actividad-economica','method' => 'GET' )) }}
{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['actividad_economicas.edit',':ID'],'id' =>'form-edit-actividad_economicas','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['actividad_economicas.show',':ID'],'id' =>'form-show-actividad_economicas','method' => 'GET
' )) }}{{ Form::close() }}

{{---------------------------------------------tipo_identificaciones -----------------------------------------------}}
{{-- index--}}
{{ Form::open(array('route' => 'tipo_identificaciones.index','id' =>'form-index-tipo-identificacion','method' => 'GET' )) }}
{{ Form::close() }}
{{-- edit  --}}
{{ Form::open(array('route' => ['tipo_identificaciones.edit',':ID'],'id' =>'form-edit-tipo_identificaciones','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['tipo_identificaciones.show',':ID'],'id' =>'form-show-tipo-identificacion','method' => 'GET
' )) }}{{ Form::close() }}
{{---------------------------------------------ubicaciones -----------------------------------------------}}
{{-- index --}}
{{ Form::open(array('route' => 'ubicaciones.index','id' =>'form-index-ubicaciones','method' => 'GET' )) }}
{{ Form::close() }}
{{-- edit --}}
{{ Form::open(array('route' => ['ubicaciones.edit',':ID'],'id' =>'form-edit-ubicaciones','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show --}}
{{ Form::open(array('route' => ['ubicaciones.show',':ID'],'id' =>'form-show-ubicaciones','method' => 'GET
' )) }}{{ Form::close() }}
{{---------------------------------------------grupos -----------------------------------------------}}
{{-- index --}}
{{ Form::open(array('route' => 'grupos.index','id' =>'form-index-grupos','method' => 'GET' )) }}
{{ Form::close() }}
{{-- edit --}}
{{ Form::open(array('route' => ['grupos.edit',':ID'],'id' =>'form-edit-grupos','method' => 'GET
' )) }}{{ Form::close() }}
{{-- show --}}
{{ Form::open(array('route' => ['grupos.show',':ID'],'id' =>'form-show-grupos','method' => 'GET
' )) }}{{ Form::close() }}
{{---------------------------------------------plantaciones -----------------------------------------------}}
{{-- index  --}}
{{ Form::open(array('route' => 'plantaciones.index','id' =>'form-index-plantaciones','method' => 'GET' )) }}
{{ Form::close() }}
{{-- show  --}}
{{ Form::open(array('route' => ['plantaciones.show',':ID'],'id' =>'form-show-plantaciones','method' => 'GET
' )) }}{{ Form::close() }}
{{-- edit  zona--}}
{{ Form::open(array('route' => ['zonas.edit',':ID'],'id' =>'form-edit-zonas','method' => 'GET
' )) }}{{ Form::close() }}
{{---------------------------------------------zonas -----------------------------------------------}}

{{-- index zonas --}}
{{ Form::open(array('route' => 'zonas.index','id' =>'form-index-zonas','method' => 'GET' )) }}
{{ Form::close() }}
{{-- show zona --}}
{{ Form::open(array('route' => ['zonas.show',':ID'],'id' =>'form-show-zonas','method' => 'GET
' )) }}{{ Form::close() }}
<!--  ---------------------------------------------perfiles---------------------------------------- -->
{{ Form::open(array('route' => 'prev_next.store','id' =>'form-store-prev_next','method' => 'POST' )) }}
{{ Form::close() }}
{{---------------------------------------------productos -----------------------------------------------}}
{{-- index --}}
{{ Form::open(array('route' => 'productos.index','id' =>'form-index-productos','method' => 'GET' )) }}{{ Form::close() }}
  {{-----------------------------------------------tipo_vehiculos------------------------------------------------- --}}
{{-- index tipo_vehiculos --}}
{{ Form::open(array('route' => 'tipo_vehiculos.index','id' =>'form-index-tipo_vehiculos','method' => 'GET' )) }}{{ Form::close() }}
{{-- -------------------------------------------------vehiculos------------------------------------------------- --}}
{{-- index vehiculos --}}
{{ Form::open(array('route' => 'vehiculos.index','id' =>'form-index-vehiculos','method' => 'GET' )) }}{{ Form::close() }}

<!--  ----------------------------------------------productos--------------------------------------------------> 
{{-- index clases_productos --}}
{{ Form::open(array('route' => 'clases_productos.index','id' =>'form-index-clases_productos','method' => 'GET' )) }}{{ Form::close() }}

<!--  ----------------------------------------------terceros----------------------------------------------------> 
{{-- index tipo_terceros --}}
{{ Form::open(array('route' => 'tipo_terceros.index','id' =>'form-index-tipo_terceros','method' => 'GET' )) }}{{ Form::close() }}
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
<!--  ----------------------------------------------generales---------------------------------------------------> 
{{-- index unidades_medida --}}
{{ Form::open(array('route' => 'unidades_medida.index','id' =>'form-index-unidades_medida','method' => 'GET' )) }}{{ Form::close() }}
{{-- index division_geografica --}}
{{ Form::open(array('route' => 'division_geografica.index','id' =>'form-index-division_geografica','method' => 'GET' )) }}{{ Form::close() }}
{{-- index tipos_identificacion --}}
{{ Form::open(array('route' => 'tipos_identificacion.index','id' =>'form-index-tipos_identificacion','method' => 'GET' )) }}{{ Form::close() }}
@endsection
<!-------------------------------------------------error-------------------------------------------------------> 
{{-- index error --}}
{{ Form::open(array('route' => 'errores.index','id' =>'form-index-error','method' => 'GET' )) }}{{ Form::close() }}{{ Form::close() }}
{{-- usuarios --}}
{{ Form::open(array('route' => 'usuarios.index','id' =>'form-index-usuarios','method' => 'GET' )) }}{{ Form::close() }}
{{ Form::open(array('route' => 'metodosAjax.index','id' =>'form-index-ajax','method' => 'GET' )) }}{{ Form::close() }}