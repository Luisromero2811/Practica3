<?php

namespace App\Http\Controllers;
use App\Comentarios;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Actualizar extends Controller
{
        public function Actualizarproduct(Request $request, $id)
        {
            $Product=Producto::find($id);
            $Product->update(['Nombre_Producto'=>$request->Nombre_Producto]);
            $Product->save();
        }
        public function Eliminar(Request $request, $id)
        {
            $Product=Comentarios::where('id_producto','=',$id);
            $Product->delete();
            $Product=Producto::where('Nombre_Producto','=',$request->Nombre_Producto);
            $Product->delete();
            
        }
        public function Eliminarcommit($id)
        {
            $Commit=Comentarios::where('id','=',$id);
            $Commit->delete();
        }
        public function Actualizarcommit(Request $request, $id)
    {
        $Comentarios=Comentarios::find($id);
        $Comentarios->update(['Comentarios'=>$request->Comentarios]);
        $Comentarios->update(['id_producto'=>$request->id_producto]);
        $Comentarios->update(['id_personas'=>$request->id_personas]);
        $Comentarios->save();
        //$request->validate([
          //  'first_name'=>'required',
            //'last_name'=>'required',
            //'email'=>'required'
       // ]);
        //$contact->first_name =  $request->get('first_name');
        //$contact->last_name = $request->get('last_name');
        
        
    }    
}
