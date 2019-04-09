<?php

namespace Extractora\modelos\plantaciones;

use Illuminate\Database\Eloquent\Model;

class lote extends Model
{
    public $timestamps = false;
	protected $table = "LOTES";
	protected $fillable = [
		'nombre',
		'nroplanta',
		'hectarea',
		'fechasiembra',
		'descripcion',
		'variedadpalma_id',
		'plantacion_id'		
	];

    //Relaciones 
	public function variedadPalma(){
		return $this->belongsTo(variedadPalma::class,'variedadpalma_id');
	}
	//Relaciones 
	public function plantacion(){
		return $this->belongsTo(plantacion::class,'plantacion_id');
	}

	public function scopePlantacionAsociada($query, $id)
	{
		if (trim($id) != "") {
			$query->where('plantacion_id', '=', $id);
		}
	}
	
}
