<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table='comentarios';
    protected $fillable = ['Comentarios','id_producto','id_personas'];
    public function Producto()
    {
        return $this->hasOne('app\Producto');
        
    }
    public function Personas()
    {
        return $this->hasOne('app\Personas');
    }
    public $timestamps= false;
}
