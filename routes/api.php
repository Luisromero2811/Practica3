<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Middleware;
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
//Ruta para actualizar permisos
Route::put('Modificarpermiso','AuthController@Update');
//Ruta de middleware
Route::middleware('auth:sanctum')->get('usuario',"AuthController@Validacion");
Route::middleware('auth:sanctum')->delete('logout',"AuthController@Logout");
//Rutas para registrar y loguear
Route::post('/Registrar','AuthController@registro');
Route::post('/Ingresar','AuthController@Login');
Route::post('/Agregarproducto','AuthController@Agregarproducto')->middleware('Accionvendedor');
//Route::post();
//Consultas
Route::middleware('auth:sanctum')->get("Innovasport",'Innovasport@Productos');
Route::middleware('auth:sanctum')->get("Innovasport/Consulta1/{id?}",'Innovasport@Productoid');
Route::get("Innovasport/Consulta2",'ProductoComentario@ProductosCommit');
Route::get("Innovasport/Consulta3/{id}",'Usercommit@Usercommit');
//Inserciones
Route::post("Innovasport/GuardarProducto",'Innovasport@GuardarProducto');
Route::post("/Guardarcomentarios",'Guardarcomentarios@Guardar');
Route::post("/GuardarPersona",'Persona@Guardar');
//Actualizaciones
Route::put("Innovasport/Actualizarproducto/{id}",'Actualizar@Actualizarproduct');
Route::put("Innovasport/Actualizarcommit/{id}", 'Actualizar@Actualizarcommit');
Route::middleware('auth:sanctum')->put("Permiso",'AuthController@ActualizarPermiso');
//Eliminar
Route::delete("Innovasport/Eliminarproducto/{id}",'Actualizar@Eliminar');
Route::delete("Innovasport/Eliminarcommit/{id}",'Actualizar@Eliminarcommit');
Route::delete("/Eliminarpersona/{id}",'Persona@Eliminar');
//Correos
Route::post("Mandarcorreo",'Correocontroller@Send'); 
Route::get("Verificacion/{id}",'Correocontroller@Verificar');
Route::post("Consulta/{id}",'Verificacion@Permisodenied');
//Imagen de perfil
Route::post("Perfil/{id}/Subirimagen",'Imagenuser@Subirimagen');
