<?php

namespace Extractora\modelos\terceros;

use Illuminate\Database\Eloquent\Model;

class telefono extends Model
{
	public $timestamps = false;
	protected $table = "TELEFONOS";
	protected $fillable = [	
		'numero',	
		'tercero_id',	
	];

	//Relaciones muchos telefonos PERTENECE A ---------------------------------------------
	public function tercero(){
		return $this->belongsTo(tercero::class,'tercero_id');
	}
}
