<?php

namespace App;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Personas extends Model
{use HasApiTokens, Notifiable;
    //Table referencia a que tabla se va a ligar en caso de tener otro nombre
    //Poder realizar cambios 
    protected $fillable = ['Nombre','Edad','Correo','password'];
    public function Comentarios()
    {
        return $this->hasMany('app\Comentarios');  
    }
    public $timestamps= false;
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
}
