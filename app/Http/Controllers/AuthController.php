<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Personas;
use App\Producto;
use App\personal_access_tokens;
use Illuminate\Support\Facades\Mail;
use App\Mail\Permisoaceptado;
use App\Http\Controllers\Persona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{ 
  //Ingreso de admin y creacion de su token
  
  public function Login(Request $request)
  {
      //Solicitud de correo y password
    $request->validate([
        'Correo'=>'required', 'password'=>'required',
    ]);
    //Va guardar en la variable lo que encuentre
    $Personas= Personas::where('Correo',$request->Correo)->first();
    if(!$Personas|| !Hash::check($request->password,$Personas->password))
    {
    throw ValidationException::withMessages([
        'Correo|password'=>["Datos erroneos"],
    ]);
    }
    if($Personas->Tipo_Rol=="Administrador"){
      $token=$Personas->createToken($request->Correo,['Administrador'])->plainTextToken;
    return response()->json(["token"=>$token],201);
    }
    else if($Personas->Tipo_Rol=="Vendedor"){
      $token=$Personas->createToken($request->Correo,['Vendedor'])->plainTextToken;
    return response()->json(["token"=>$token],201);
    }
    else{
      $token=$Personas->createToken($request->Correo,['Usuario'])->plainTextToken;
    return response()->json(["token"=>$token],201);
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
        'Tipo_Rol'=>'required',
    ]);
        $Personas = new Personas();
        $Personas->Nombre=$request->Nombre;
        $Personas->Edad=$request->Edad;
        $Personas->Correo=$request->Correo;
        $Personas->password=Hash::make($request->password);
        $Personas->Tipo_Rol=$request->Tipo_Rol;
        $Personas->Verificado=false;
        if($Personas->save())
        {
        return response()->json($Personas,200);}
        return abort(422,"Fallo registro");
  }
  public function Agregarproducto(Request $request)
  {
    $Product = new Producto();
    $Product->id=$request->id;
    $Product->Nombre_Producto=$request->Nombre_Producto;
    if($Product->save())
    return response()->json(["product"=>$Product],201);
    return response()->json(null,400);
  }
   public function Actualizarpermiso(Request $request)
   {
    $Personas = Personas::Where('Correo', $request->Correo)->first();
    //return response()->json($Personas);
    if($Personas->tokens[0]->abilities[0]=="Administrador"){        
      $Personas = Personas::where('Nombre', $request->Nombre)->first(); 
              $Personas->update(['Tipo_Rol' => $request->Tipo_Rol]);
              //$permiso=$request->abilities;
              //return response()->json($permiso);

              $correo=Mail::to('luisvazquezromero28@gmail.com')->send(new Permisoaceptado($Personas));
              
              return response()->json(["Permiso Actualizado a"=>$Personas]);            
            }
    else{
      return response()->json("No tienes permiso de Actualizar Permisos",400);
    }
   }
 }
