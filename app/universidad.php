<?php

namespace Extractora;

use Extractora\estudiante;
use Illuminate\Database\Eloquent\Model;

class universidad extends Model
{
    public $timestamps = false;
	protected $table = "UNIVERSIDAD";
	protected $fillable = [
		'nombre',				
	]; 

	public function estudiante(){          
		return $this->hasMany(estudiante::class);
	}
}
