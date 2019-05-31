<?php

namespace Extractora\modelos\errores;

use Extractora\User;
use Illuminate\Database\Eloquent\Model;

class logErrores extends Model
{

	public $timestamps = false;


	protected $table = "ERRORES";	
	protected $fillable = [
		'msg',
		'clase',
		'funcion',
		'usuario_id',
		'fecha',
	];

    //Relaciones
	public function user(){
		return $this->belongsTo(User::class,'usuario_id');
	}
}
