<?php

namespace App\Http\Controllers;
use App\Comentarios;
use App\Producto;
use App\Personas;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class Persona extends Controller
{
    use HasApiTokens, Notifiable;
    Public function Guardar(Request $request)
    {
    $Persona = new Personas();
    $Persona->id=$request->id;
    $Persona->Nombre=$request->Nombre;
    $Persona->Edad=$request->Edad;
    $Persona->Correo=$request->Correo;
    $Persona->password=$request->password;
    $Persona->Tipo_Rol=$request->Tipo_Rol;
    $Persona->save();
    }
    Public function Actualizar(Request $request, $id)
    {
        $Persona=Personas::find($id);
        $Persona->update(['Nombre'=>$request->Nombre]);
        $Persona->update(['Edad'=>$request->Edad]);
        $Persona->update(['Correo'=>$request->Correo]);
        $Persona->update(['password'=>$request->password]);
        $Persona->update(['Tipo_Rol'=>$request->password]);
        $Persona->save();
    }
    public function Eliminar (Request $request, $id)
    {
        $Persona=Comentarios::where('id_personas','=',$id);
            $Persona->delete();
            $Persona=Personas::where('Nombre','=',$request->Nombre);
             //'Edad','=',$request->Edad,'Correo','=',$request->Correo);
            $Persona->delete();

    }
    /*public function registro(Request $request)
  {
      //Registro de un nuevo usuario
    $request->validate([
        'Correo'=>'required|email',
        'password'=>'required',
        'Nombre'=>'required',
        'Edad'=>'required',
    ]);
        $Personas = new Persona();
        $Personas->Nombre=$request->Nombre;
        $Personas->Edad=$request->Edad;
        $Personas->Correo=$request->Correo;
        $Personas->password=Hash::make($request->password);
        if($Personas->save())
        {
        return response()->json($Personas,200);}
        return abort(422,"Fallo registro");
  }*/
}
