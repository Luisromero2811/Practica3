<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    public function Producto()
    {
        return $this->hasOne('app\Producto');
    }
}
