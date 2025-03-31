<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Carpetas extends Model
{
    protected $table = "carpetas";
    protected $primaryKey = "id_carpeta";

    public $timestamps = false;
    public function nuevo($id_padre, $id_area, $carpeta_nombre)
    {
        $nuevo = new Carpetas();
        $nuevo->id_padre = $id_padre;
        $nuevo->id_area = $id_area;
        $nuevo->carpeta_nombre = $carpeta_nombre;
        $nuevo->save();
        return $nuevo->id_carpeta;
    }

    public function editar($id_carpeta, $carpeta_nombre)
    {
        $carpeta = Carpetas::find($id_carpeta);
        $carpeta->carpeta_nombre = $carpeta_nombre;
        $carpeta->save();
        return true;
    }
}