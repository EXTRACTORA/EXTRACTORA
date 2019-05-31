<?php

namespace Extractora;

use Extractora\universidad;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
	public $timestamps = false;
	protected $table = "ESTUDIANTE";
	protected $fillable = [
		'nombre',	
		'universidad_id',			
	];
	
	public function universidad(){
		return $this->belongsTo(universidad::class,'universidad_id');
	}
}


