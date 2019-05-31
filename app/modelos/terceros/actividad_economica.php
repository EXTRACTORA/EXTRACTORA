<?php

namespace Extractora\modelos\terceros;

use Illuminate\Database\Eloquent\Model;

class actividad_economica extends Model
{
       public $timestamps = false;
	protected $table = "ACTIVIDAD_ECONOMICA";
	protected $fillable = [	
		'nombre',		
	];

	//Relaciones
	public function tercero(){          
		return $this->hasMany(tercero::class);
	}
}
