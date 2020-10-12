<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Innovasport extends Controller
{
    
    public function Productos()
    {
        //$users = DB::table('users')->select('name', 'email as user_email')->get();
        $Producto=DB::table('productos')->get();
        return $Producto;
    }
}
