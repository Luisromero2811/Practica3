<?php
namespace App\Http\Controllers;
use APP\Comentarios;
use App\Producto;
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
    public function Productoid($id=null){
        if($id)
            return response()->json(["producto"=>Producto::find($id)],200);
        return response()->json(["productos"=>Producto::all()],200);
    }
    public function GuardarProducto(Request $request)
    {
        $Product = new Producto();
        $Product->id=$request->id;
        $Product->Nombre_Producto=$request->Nombre_Producto;
        if($Product->save())
        return response()->json(["product"=>$Product],201);
        return response()->json(null,400);
    }
}
