<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::get('Usuarioactualizar', function () {
//})->middleware('Checaruser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Ruta de middleware
Route::middleware('auth:sanctum')->get('usuario',"App\Http\Controllers\AuthController@Validacion");
Route::middleware('auth:sanctum',)->delete('logout',"App\Http\Controllers\AuthController@registro");
//Rutas para registrar y loguear
Route::post('Registrar','AuthController@registro');
Route::post("Ingresar",'AuthController@Login');
//Consultas
Route::get("Innovasport",'Innovasport@Productos');
Route::get("Innovasport/Consulta1/{id?}",'Innovasport@Productoid');
Route::get("Innovasport/Consulta2",'ProductoComentario@ProductosCommit');
Route::get("Innovasport/Consulta3/{id}",'Usercommit@Usercommit');
//Inserciones
Route::post("Innovasport/GuardarProducto",'Innovasport@GuardarProducto');
Route::post("/Guardarcomentarios",'Guardarcomentarios@Guardar');
Route::post("/GuardarPersona",'Persona@Guardar');
//Actualizaciones
Route::put("Innovasport/Actualizarproducto/{id}",'Actualizar@Actualizarproduct');
Route::put("Innovasport/Actualizarcommit/{id}", 'Actualizar@Actualizarcommit');
Route::put("/Actualizarpersona/{id}",'Persona@Actualizar');
//Eliminar
Route::delete("Innovasport/Eliminarproducto/{id}",'Actualizar@Eliminar');
Route::delete("Innovasport/Eliminarcommit/{id}",'Actualizar@Eliminarcommit');
Route::delete("/Eliminarpersona/{id}",'Persona@Eliminar');
