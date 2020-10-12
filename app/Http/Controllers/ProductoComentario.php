<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductoComentario extends Controller
{
    public function ProductosCommit()
    {
        $Productcommit=DB::table('comentarios') 
        ->join('productos','comentarios.id_producto','=','productos.id')
        ->select('comentarios.*','productos.Nombre_Producto')
        ->get();
        return $Productcommit;
    }
}

