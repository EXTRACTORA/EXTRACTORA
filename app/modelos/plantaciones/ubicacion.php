<?php

namespace Extractora\modelos\ubicacion;

use Illuminate\Database\Eloquent\Model;

class ubicacion extends Model
{
	public $timestamps = false;
	protected $table = "UBICACIONES";
	protected $fillable = [
		'nombre',
		'descripcion'		
	];


	public function scopeNombre($query, $nombre)
	{
		if (trim($nombre) != "") {
			$query->where('nombre', "LIKE", "%$nombre%");
		}

	}
  	//Relaciones  belongsTo : una ubicacion TIENE MUCHAS plantaciones 
	public function plantacion(){          
		return $this->hasMany(plantacion::class);
	}
}
