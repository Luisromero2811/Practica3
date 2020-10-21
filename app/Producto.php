<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['Nombre_Producto'];
    public function Comentarios()
    {
        return $this->hasMany('app\Comentarios');  
    }
    public $timestamps= false;
}
