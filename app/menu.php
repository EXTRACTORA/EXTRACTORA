<?php

namespace Extractora;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
	public $timestamps = false;
	protected $table = "MENU";
	protected $fillable = [
		'nombre',		
	];

	//Relaciones belongsToMany : muchos perfil pertenece a muchos menu
	public function perfil(){
		return $this->belongsToMany(perfil::class,'menu_perfil')
		->withPivot('perfiles_id');
	}
}



