<?php
namespace App\Http\Controllers;
use APP\Comentarios;
use App\Producto;
use APP\Personas;
use Illuminate\Support\Facades\Mail;
use App\Mail\Permisodenegado;
use App\Mail\Agregarproducto;
use App\Http\Controllers\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Innovasport extends Controller
{
    public function Productos()
    {
        //$users = DB::table('users')->select('name', 'email as user_email')->get();
        //$Producto=DB::table('productos')->get();
        //return $Producto;
        //
    }
    public function Productoid($id=null, Request $request){
        //return response()->json($Personas);
        $Personas = Personas::Where('Correo', $request->Correo)->first();
        $accion="Verificar producto";
        if($Personas->tokens[0]->abilities[0]=="Administrador" || $Personas->tokens[0]->abilities[0]=="Vendedor"){
        if($id)
            return response()->json(["producto"=>Producto::find($id)],200);
        }
        else{
            $correo=Mail::to('19170067@uttcampus.edu.mx')->send(new Permisodenegado($Personas,$accion));
            return response()->json("No tienes permiso de Administrador y Vendedor",400);
        }
        } 
    public function GuardarProducto(Request $request)
    {
        $Product = new Producto();
        $Product->id=$request->id;
        $Product->Nombre_Producto=$request->Nombre_Producto;
        if($Product->save())
        $correo=Mail::to('19170067@uttcampus.edu.mx')->send(new Agregarproducto($Product));
        return response()->json(["product"=>$Product],201);
        return response()->json(null,400);
    }
}
