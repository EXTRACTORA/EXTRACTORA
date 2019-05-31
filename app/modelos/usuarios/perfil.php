<?php

namespace Extractora\modelos\usuarios;

use Illuminate\Database\Eloquent\Model;

class perfil extends Model
{

	public $timestamps = false;
	protected $table = "PERFILES";
	protected $fillable = [
		'nombre',	
		'descripcion'		
	];


	//Relaciones  belongsTo : un perfil TIENE MUCHOS usuarios 
	public function usuario(){          
		return $this->hasMany(usuarios::class);
	}

	//Relaciones belongsToMany : muchos perfil pertenece a muchos menu
	public function menu(){
		return $this->belongsToMany(menu::class,'menu_perfil')
		->withPivot('menu_id');
	}
}
