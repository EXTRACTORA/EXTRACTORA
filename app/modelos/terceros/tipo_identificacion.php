<?php

namespace Extractora\modelos\terceros;

use Extractora\modelos\terceros\tercero;
use Illuminate\Database\Eloquent\Model;

class tipo_identificacion extends Model
{
     public $timestamps = false;
	protected $table = "TIPO_IDENTIFICACION";
	protected $fillable = [	
		'nombre',		
	];

	//Relaciones
	public function tercero(){          
		return $this->hasMany(tercero::class);
	}
}
