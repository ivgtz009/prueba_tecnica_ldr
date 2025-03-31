<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Archivo extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";

    public $timestamps = false;
    public function nuevo($id_carpeta, $id_tipo_archivo, $archivo_nombre, $archivo_ruta, $archivo_fecha_creacion)
    {
        $nuevo = new Archivo();
        $nuevo->id_carpeta = $id_carpeta;
        $nuevo->id_tipo_archivo = $id_tipo_archivo;
        $nuevo->archivo_nombre = $archivo_nombre;
        $nuevo->archivo_ruta = $archivo_ruta;
        $nuevo->archivo_fecha_creacion = $archivo_fecha_creacion;
        $nuevo->save();
        return $nuevo->id_carpeta;
    }

    public function eliminar($id_archivo)
    {
        $archivo = Archivo::find($id_archivo);
        $archivo->delete();
        return true;
    }
    public function editarArchivo($id_archivo, $archivo_nombre)
    {
        $archivo = Archivo::find($id_archivo);
        $archivo->archivo_nombre = $archivo_nombre;
        $archivo->save();
        return true;
    }
}