<?php

namespace Extractora\modelos\terceros;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    public $timestamps = false;
	protected $table = "DIRECCIONES";
	protected $fillable = [	
		'tercero_id',	
		'ciudad_id',
		'departamento_id',
		'pais_id',
		'direccion',
	];

	//Relaciones muchas direcciones PERTENECE A -------------------------------------------
	public function tercero(){
		return $this->belongsTo(tercero::class,'tercero_id');
	}
}
