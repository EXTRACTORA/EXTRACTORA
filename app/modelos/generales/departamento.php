<?php

namespace Extractora\modelos\generales;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    public $timestamps = false;
	protected $table = "DEPARTAMENTOS";
	protected $fillable = [
		'codigo',
		'nombre',
		'pais_id',

	];

	// public function menu(){
	// 	return $this->belongsToMany('\App\menu','ROLES_MENUS');
 //        // ->withPivot('roles_id');
	// } 
	public function scopeNombre($query, $nombre)
	{
		if (trim($nombre) != "") {
			$query->where('nombre', "LIKE", "%$nombre%");
		}

	}
}
