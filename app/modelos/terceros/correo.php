<?php

namespace Extractora\modelos\terceros;

use Illuminate\Database\Eloquent\Model;

class correo extends Model
{
     public $timestamps = false;
	protected $table = "CORREOS";
	protected $fillable = [	
		'nombre',
		'tercero_id',		
	];

    //Relaciones muchos correos PERTENECE A ---------------------------------------------
	public function tercero(){
		return $this->belongsTo(tercero::class,'tercero_id');
	}
}
