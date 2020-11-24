<?php

namespace App\Http\Controllers;
use App\Comentarios;
use App\Producto;
use App\Personas;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComentarioUsuario;
use App\Mail\ComentarioAdmin;
//use App\Http\Controllers\Persona;
use App\Http\Controllers\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Guardarcomentarios extends Controller
{
    public function Guardar(Request $request)
    {
        //return response()->json($request);
        $Producto=Producto::where('id',$request->id_producto)->first();
        $Persona=Personas::where('Tipo_Rol','Administrador')->first();
        $Comentarios= new Comentarios();
        $Comentarios->Comentarios=$request->Comentarios;
        $Comentarios->id_producto=$request->id_producto;
        $Comentarios->id_personas=$request->id_personas;
        //return response()->json($Producto);
        //return response()->json($Persona);
        $correo=Mail::to('19170067@uttcampus.edu.mx')->send(new ComentarioUsuario($Comentarios, $Producto));
        $correo=Mail::to('luisvazquezromero28@gmail.com')->send(new ComentarioAdmin($Persona, $Comentarios));
        $Comentarios->save();
    }
}
