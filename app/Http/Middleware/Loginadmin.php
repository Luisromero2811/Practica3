<?php

namespace App\Http\Middleware;

use Closure;
use App\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class Loginadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Valida si es Admin
        
        $Administrador=Personas::find(4);
    if($request->Correo==$Administrador->Correo)
    {
        return $next($request);
  }
        else{
            return abort(400);
        }
    }
}









/*
{
        $db=User::where('email',$request->email)->first();
        if($db->TipoUsuario=='admin')
        {
            return $next($request);
        }
        return abort(400,'No tienes permiso de hacer eso, ya que no eres administrador');
    }
*/