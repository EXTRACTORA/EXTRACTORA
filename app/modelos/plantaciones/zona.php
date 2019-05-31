<?php

namespace Extractora\modelos\plantaciones;

use Illuminate\Database\Eloquent\Model;

class zona extends Model
{
	public $timestamps = false;
	protected $table = "ZONAS";
	protected $fillable = [
		'nombre',
		'descripcion'		
	];
	
	//Relaciones
	public function plantacion(){          
		return $this->hasMany(plantacion::class);
	}
}
