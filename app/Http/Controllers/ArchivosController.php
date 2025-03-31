<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carpetas;
use App\Models\Empresas;
use App\Models\Areas;
use App\Models\TipoArchivo;
use App\Models\Direcciones;
use App\Models\Archivo;
use Illuminate\Support\Facades\Storage;
class ArchivosController extends Controller
{
    public function index()
    {
        $empresas = Empresas::all();
        $tipo_archivo = TipoArchivo::all();
        return view("archivos.formulario", compact("empresas", "tipo_archivo"));
    }
    public function nuevo(Request $request)
    {
        $modeloArchivos = new Archivo();
        $modeloCarpetas = new Carpetas();
        $archivo = $request->file('archivo');
        if ($archivo) {

            $nombreArchivo = $archivo->getClientOriginalName();
            $ruta_base = 'recursos/' . $request->empresa;
            if (!file_exists($ruta_base)) {
                mkdir($ruta_base, 0777, true);
            }
            $rutaSegunda = $ruta_base . '/' . $request->direccion;
            if (!file_exists($rutaSegunda)) {
                mkdir($rutaSegunda, 0777, true);
            }
            $rutaTercera = $rutaSegunda . '/' . $request->area;
            if (!file_exists($rutaTercera)) {
                mkdir($rutaTercera, 0777, true);
            }
            $id_carpeta = $modeloCarpetas->nuevo($request->id_padre, $request->area, $request->carpeta);
            if ($id_carpeta) {
                $rutaFinal = $rutaTercera . '/' . $id_carpeta;
                if (!file_exists($rutaFinal)) {
                    mkdir($rutaFinal, 0777, true);
                }
                $archivo->move($rutaFinal, $nombreArchivo);
                $fecha = date("Y-m-d H:i:s");
                $nuevo = $modeloArchivos->nuevo(
                    $id_carpeta,
                    $request->tipo_archivo,
                    $nombreArchivo,
                    $rutaFinal . '/' . $nombreArchivo,
                    $fecha
                );
            }
        }
        return redirect("/formulario");

    }
    public function selectDirecciones($id_empresa)
    {
        $direcciones = Direcciones::where("id_empresa", $id_empresa)->get();
        return view("archivos.select_direcciones", compact("direcciones"));
    }
    public function selectAreas($id_direccion)
    {
        $areas = Areas::where("id_direccion", $id_direccion)->get();
        return view("archivos.select_areas", compact("areas"));
    }

    public function empresas()
    {
        $empresas = Empresas::all();
        return view("archivos.empresas", compact("empresas"));
    }
    public function direcciones($id_empresa)
    {
        $direcciones = Direcciones::where("id_empresa", $id_empresa)->get();
        return view("archivos.direcciones", compact("direcciones"));
    }
    public function areas($id_direccion)
    {
        $areas = Areas::where("id_direccion", $id_direccion)->get();
        return view("archivos.areas", compact("areas"));
    }
    public function carpetas($id_area)
    {
        $carpetas = Carpetas::where("id_area", $id_area)->get();
        return view("archivos.carpetas", compact("carpetas","id_area"));
    }
    public function archivos($id_carpeta)
    {
        $archivos = Archivo::where("id_carpeta", $id_carpeta)->get();
        return view("archivos.archivos", compact("archivos", "id_carpeta"));
    }
    public function eliminarArchivo($id_archivo)
    {
        $modeloArchivo = new Archivo();
        $archivo = $modeloArchivo->find($id_archivo);
        if (file_exists($archivo->archivo_ruta)) {
            // Eliminar el archivo
            unlink($archivo->archivo_ruta);
            $archivoEliminado = $modeloArchivo->eliminar($id_archivo);
        }
        return redirect("/empresas");
    }

    public function eliminarCarpeta($id_carpeta)
    {
        $modeloCarpeta = new Carpetas();
        $carpeta = $modeloCarpeta->find($id_carpeta);
        if ($carpeta) {
            $archivosCarpeta = Archivo::where("id_carpeta", $id_carpeta)->get();
            foreach ($archivosCarpeta as $archivo) {
                $archivo->delete();
            }
            $carpeta->delete();
        }
        return redirect("/empresas");
    }

    public function editarCarpeta(Request $request)
    {
        $modeloCarpeta = new Carpetas();
        $modeloCarpeta->editar($request->id_carpeta, $request->carpeta_nombre);
        return redirect("/carpetas/" . $request->id_area);
    }
    public function editarArchivo(Request $request)
    {
        $modeloArchivo = new Archivo();
        $modeloArchivo->editarArchivo($request->id_archivo, $request->archivo_nombre);
        return redirect("/archivos/" . $request->id_carpeta);
    }
}