<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
      <script>
      	window.Laravel = {!! json_encode([
      		'csrfToken' => csrf_token(),
      		]) !!};
      	</script>


      	{{-- tab --}}
      	{{-- {!!Html::script('js/tab/bootstrap.min.js')!!} --}}
      	{!!Html::script('js/jquery.scrollbar.min.js')!!}
      	{!!Html::script('js/tab/nth-tabs.js')!!}      	


      	{{-- GENERALES --}}
      	{!!Html::script('js/generales/divicion_geografica.js')!!}
      	{!!Html::script('js/generales/tipo_identificacion.js')!!}
      	{!!Html::script('js/generales/unidad_medidas.js')!!}

      	{{-- PARADAS --}}
      	{!!Html::script('js/paradas/paradas.js')!!}
      	{!!Html::script('js/paradas/tipos.js')!!}

      	{{-- PLANTACION --}}
      	{!!Html::script('js/plantaciones/grupos.js')!!}
      	{!!Html::script('js/plantaciones/plantaciones.js')!!}
      	{!!Html::script('js/plantaciones/ubicaciones.js')!!}
      	{!!Html::script('js/plantaciones/zonas.js')!!}

      	{{-- PRODUCTOS --}}
      	{!!Html::script('js/productos/clases.js')!!}
      	{!!Html::script('js/productos/productos.js')!!}

      	{{-- TERCEROS --}}
      	{!!Html::script('js/terceros/terceros.js')!!}
      	{!!Html::script('js/terceros/tipos.js')!!}

      	{{-- USUARIOS --}}
      	{!!Html::script('js/usuarios/perfiles.js')!!}
      	{!!Html::script('js/usuarios/permisos.js')!!}
      	{!!Html::script('js/usuarios/usuarios.js')!!}

      	{{-- VEHICULOS --}}
      	{!!Html::script('js/vehiculos/tipos.js')!!}
      	{!!Html::script('js/vehiculos/vehiculos.js')!!}


      	{!!Html::script('js/extractora.js')!!}
            {!!Html::script('js/ajax.js')!!}


