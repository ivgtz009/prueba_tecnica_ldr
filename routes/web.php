<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/formulario', [ArchivosController::class,'index']);
Route::get('/select-direcciones/{id_empresa}', [ArchivosController::class,'selectDirecciones']);
Route::get('/select-areas/{id_direccion}', [ArchivosController::class,'selectAreas']);
Route::post('/guardar-archivo', [ArchivosController::class,'nuevo']);
Route::get('/empresas', [ArchivosController::class,'empresas']);
Route::get('/direcciones/{id_empresa}', [ArchivosController::class,'direcciones']);
Route::get('/areas/{id_direccion}', [ArchivosController::class,'areas']);
Route::get('/carpetas/{id_area}', [ArchivosController::class,'carpetas']);
Route::get('/archivos/{id_carpeta}', [ArchivosController::class,'archivos']);
Route::get('/eliminar-archivo/{id_archivo}', [ArchivosController::class,'eliminarArchivo']);
Route::get('/eliminar-carpeta/{id_carpeta}', [ArchivosController::class,'eliminarCarpeta']);
Route::post('/editar-archivo', [ArchivosController::class,'editarArchivo']);
Route::post('/editar-carpeta', [ArchivosController::class,'editarCarpeta']);
