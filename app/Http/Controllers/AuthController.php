<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Personas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
  public function Validacion(Request $request)
  {
      //Valida el tipo de usuario
  if($request->user()->tokenCan('user:info')&&$request->user()->tokenCan('admin:admin'))
  return response()->json(["users"=>Persona::all()],200);
  if($request->user()->tokenCan('user:info'))
  return response()->json(["profile"=>$request->user(),200]);
  abort(401,"Invalido");
  } 
  public function Login(Request $request)
  {
      //Solicitud de correo y password
    $request->validate([
        'Correo'=>'required', 'password'=>'required',
    ]);
    //Va guardar en la variable lo que encuentre
    $Persona= Persona::where('Correo',$request->Correo)->first();
    if(!$Persona|| Hash::Check($request->password,$Persona->password))
    {
    throw ValidationException::withMessages([
        'Correo|password'=>["Datos erroneos"],
    ]);
    $token=$Persona->createToken($request->Correo,['user:info','admin:admin'])->plainTextToken;
    return response()->json(['token'=>$token],201);
    }
  }  
  public function Logout(Request $request)
  {
      //Rompe los token creados
    return response()->json(["Salir"=>$request->user()->tokens()->delete()],200);
  }
  public function registro(Request $request)
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
  }
}
