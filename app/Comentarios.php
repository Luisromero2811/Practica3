<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table='comentarios';
    protected $fillable = ['Comentarios','Comentarios','id_producto','Nombre_Usuario'];
    public function Producto()
    {
        return $this->hasOne('app\Producto');
        
    }
    public $timestamps= false;
}
