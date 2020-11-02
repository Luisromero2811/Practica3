<?php

namespace App\Http\Controllers;
use App\Comentarios;
use App\Producto;
use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Guardarcomentarios extends Controller
{
    public function Guardar(Request $request)
    {
        $Comentarios= new Comentarios();
        $Comentarios->id=$request->id;
        $Comentarios->Comentarios=$request->Comentarios;
        $Comentarios->id_producto=$request->id_producto;
        $Comentarios->id_personas=$request->id_personas;
        $Comentarios->save();
    }
}
