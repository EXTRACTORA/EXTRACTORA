<?php

namespace Extractora\modelos\grupo;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
	public $timestamps = false;
	protected $table = "GRUPOS";
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
	
	//Relaciones  belongsTo : un grupo TIENE MUCHAS plantaciones 
	public function plantacion(){          
		return $this->hasMany(plantacion::class);
	}
}
