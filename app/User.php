<?php

namespace Extractora;

use Extractora\modelos\errores\logErrores;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
          //Relaciones  
    public function logErrores(){
        return $this->hasMany(logErrores::class);
    }
}
