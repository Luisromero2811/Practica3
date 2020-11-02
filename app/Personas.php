<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Personas extends Model
{
    //Table referencia a que tabla se va a ligar en caso de tener otro nombre
    //Poder realizar cambios 
    protected $fillable = ['Nombre','Edad','Correo','password'];
    public function Comentarios()
    {
        return $this->hasMany('app\Comentarios');  
    }
    public $timestamps= false;
}
