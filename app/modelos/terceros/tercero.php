<?php

namespace Extractora\modelos\terceros;

use Extractora\modelos\terceros\actividad_economica;
use Extractora\modelos\terceros\correo;
use Extractora\modelos\terceros\direccion;
use Extractora\modelos\terceros\teLefono;
use Extractora\modelos\terceros\tipo_identificacion;
use Illuminate\Database\Eloquent\Model;

class tercero extends Model
{
    public $timestamps = false;
	protected $table = "TERCEROS";
	protected $fillable = [
		'nit',
		'codigo_verificacion',
		'estado', 
		'nombre1',
		'nombre2',
		'apellido1',
		'apellido2',
		'tipo_identificacion_id',
		'actividad_economica_id',	
		'descripcion',			
	];  
	
	
	//Relaciones muchos tercero PERTENECE A -----------------------------------------------
	public function actividad_economica(){
		return $this->belongsTo(actividad_economica::class,'actividad_economica_id');
	}	
	public function tipo_identificacion(){
		return $this->belongsTo(tipo_identificacion::class,'tipo_identificacion_id');
	}	

	//Relaciones un tercero TIENE MUCHOS----------------------------------------------------
	public function teLefono(){          
		return $this->hasMany(teLefono::class);
	}
	public function direccion(){          
		return $this->hasMany(direccion::class);
	}
	public function correo(){          
		return $this->hasMany(correo::class);
	}
}


