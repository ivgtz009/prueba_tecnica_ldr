<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TipoArchivo extends Model
{
    protected $table = "tipo_archivo";
    protected $primaryKey = "id_tipo_archivo";

    public $timestamps = false;

}