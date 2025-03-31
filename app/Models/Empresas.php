<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Empresas extends Model
{
    protected $table = "empresas";
    protected $primaryKey = "id_empresa";

    public $timestamps = false;

    public function nuevo($empresa_razon_social)
    {
        $nuevo = new Empresas();
        $nuevo->empresa_razon_social = $empresa_razon_social;
        $nuevo->save();
        return $nuevo->id_empresa;
    }
}