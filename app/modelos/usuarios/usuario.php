<?php

namespace Extractora\modelos\usuarios;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
	protected $table = "USUARIOS";
     protected $fillable = [
        'name'
        , 'email'
        , 'password'
        ,'documento'
        ,'apellido1'
        ,'apellido2'
        ,'activo'
        ,'roles_id'
        ,'permiso_id'

    ];


    //Relaciones  
    public function logErrores(){
        return $this->hasMany(logErrores::class);
    }
}
