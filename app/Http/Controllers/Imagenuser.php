<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;

class Imagenuser extends Controller
{
    public function Subirimagen(Request $request, $id)
    {
        $Personas=Personas::where('id',$id)->first();
        //if($request->Personas()->id==$id){
            
            if($request->hasFile('url_imagen')){
                $file=$request->file("url_imagen");
                $filename=$file->getClientOriginalName();
                $filename=pathinfo($filename, PATHINFO_FILENAME);
                $nombrearchivo=str_replace(" ", "_",$filename);
                $extend=$file->getClientOriginalExtension();
                $picture=date('His')."_".$nombrearchivo."_".$extend;
                $file->move(public_path('File/'),$picture);
                $Ruta='File'."_".$picture;
                $Personas->update(['url_imagen'=>$Ruta]);
                return response()->json(["Message"=>"Su imagen se guardo de forma correcta", "ruta"=>$file],200);
            }else{
                return response()->json(["Message"=>"Ocurrio un problema, intentelo de nuevo"],400);
            }
        }
        //else{
          //  return response()->json("No tienes permisos para cambiar tu imagen",400);
        }
    

