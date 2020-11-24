<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registro;
use App\Http\Controllers\Persona;
use App\Personas;
class Correocontroller extends Controller
{
    public function Send(Request $request)
   {
    $Personas = Personas::Where('Correo', $request->Correo)->first();
    //return response()->json($Personas);
    $correo=Mail::to('19170067@uttcampus.edu.mx')->send(new Registro($Personas));
     return response()->json(["Correo enviado con exito"=>$correo],200);
  }
  public function Verificar($id)
  {
    $Personas=Personas::find($id);
    $Personas->update(['Verificado'=>true]);
    $Personas->save();
    return response()->json(["Correo a sido verificado correctamente"],200);
  }
}
