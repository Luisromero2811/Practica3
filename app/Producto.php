<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function Comentarios()
    {
        return $this->hasMany('app\Comentarios');
    }//
}
