<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carpetas;
class CarpetasController extends Controller
{
    public function index(Request $request)
    {
        $modeloCarpetas = new Carpetas();
        $nuevo = $modeloCarpetas->nuevo($request->id_padre, $request->id_area, $request->carpeta_nombre);
    }
}