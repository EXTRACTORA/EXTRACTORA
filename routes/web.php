<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	// return view('welcome');
	return view('adminlte::auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes	


	/*------------------------------------------------------------------------
	 1. USUARIOS
	 -------------------------------------------------------------------------*/
	 Route::resource('/perfiles', 'usuarios\perfilController');
	 Route::resource('/prev_next','registros\prev_nextController');
	 // Route::post('/prev_next','usuarios\perfilController@prev_next');

	 Route::resource('/permisos', 'usuarios\permisoController');
	 Route::resource('/usuarios', 'usuarios\usuarioController');

	/*------------------------------------------------------------------------
	 2. PLANTACIONES
	 -------------------------------------------------------------------------*/
	 Route::resource('/grupos', 'plantaciones\grupoController');	
	 Route::resource('/zonas', 'plantaciones\zonaController'); 
	 Route::resource('/ubicaciones', 'plantaciones\ubicacionController');
	 Route::resource('/plantaciones', 'plantaciones\plantacionController');

	/*------------------------------------------------------------------------
	 3. VEHICULOS
	 -------------------------------------------------------------------------*/
	 Route::resource('/tipo_vehiculos', 'vehiculos\tipoController');
	 Route::resource('/vehiculos', 'vehiculos\vehiculoController');

 	/*------------------------------------------------------------------------
	 4. PRODUCTOS
	 -------------------------------------------------------------------------*/
	 Route::resource('clases_productos', 'productos\clasesController');
	 Route::resource('/productos', 'productos\productoController');

	/*------------------------------------------------------------------------
	 5. TERCEROS
	 -------------------------------------------------------------------------*/
	 Route::resource('/tipo_terceros', 'terceros\tipoController');
	 Route::resource('/terceros', 'terceros\terceroController');
	 Route::resource('/actividad_economicas', 'terceros\actividad_economicaController');
	 Route::resource('/tipo_identificaciones', 'terceros\tipo_identificacionController');
	/*------------------------------------------------------------------------
	 6. PARADAS
	 -------------------------------------------------------------------------*/
	 Route::resource('/tipo_paradas', 'paradas\tipoController');
	 Route::resource('/paradas', 'paradas\paradaController');

	/*------------------------------------------------------------------------
	 7. EQUIPOS
	 -------------------------------------------------------------------------*/
	 Route::resource('/fases_proceso', 'equipos\fases_procesoController');
	 Route::resource('/equipos', 'equipos\equipoController');

    /*------------------------------------------------------------------------
	 8. GENERALES
	 -------------------------------------------------------------------------*/
	 Route::resource('/unidades_medida', 'generales\unidades_medidaController');
	 Route::resource('/division_geografica', 'generales\division_geograficaController');
	 Route::resource('/tipos_identificacion', 'generales\tipos_identificacionController');

	 Route::resource('/paises', 'generales\paisController');
	 Route::resource('/departamentos', 'generales\departamentoController');
	 Route::resource('/ciudades', 'generales\ciudadController');

	//metodos ajax 
	 Route::resource('/metodosAjax', 'metodosAjaxController');
	 Route::resource('/estudiantes', 'estudianteController');
	 //errores 
	 Route::resource('/errores', 'errores\erroresController');	 
	 

	});
