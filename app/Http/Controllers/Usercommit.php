<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Usercommit extends Controller
{
    public function Usercommit()
    {
      $Comentario=DB::table('comentarios')
      ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*','productos.Nombre_Producto')
        ->where('comentarios.Nombre_Usuario','=','Luis Romero')
        ->get();
      return $Comentario;
    }
}
