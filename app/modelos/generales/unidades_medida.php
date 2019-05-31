<?php

namespace Extractora\modelos\generales;

use Extractora\modelos\productos\producto;
use Illuminate\Database\Eloquent\Model;

class unidades_medida extends Model
{
    public $timestamps = false;
	protected $table = "UNIDAD_MEDIDA";
	protected $fillable = [
		'nombre',	
		'abreviatura',
		'descripcion'		
	];

	//Relaciones  belongsTo : una Unidad de medida TIENE MUCHOS productos
	public function producto(){          
		return $this->hasMany(producto::class);
	}
}
