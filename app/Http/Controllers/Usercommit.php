<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Usercommit extends Controller
{
    public function Usercommit($id)
    {
      $Comentario=DB::table('comentarios')
      ->join('personas','comentarios.id_personas','=','personas.id')
      ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*','personas.Nombre','productos.Nombre_Producto')
        ->where('comentarios.id_personas','=',$id)
        ->get();
      return $Comentario;
    }
}

//Producto con comentarios

