<?php
namespace Extractora\clases;

use Extractora\clases\fecha;
use Extractora\modelos\errores\logErrores;

class notificaciones {


	public static function setError($e,$clase,$funcion){
	
	     //guardando el error
		$error =  logErrores::create([			
			'msg'=>$e,
			'clase'=>$clase,
			'funcion'=>$funcion,
			'usuario_id'=>\Auth::user()->id,
			'fecha'=>fecha::getTimeNowConHora(),
		]);	
	    
	}

}