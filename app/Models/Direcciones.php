<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Direcciones extends Model
{
    protected $table = "direcciones";
    protected $primaryKey = "id_direccion";

    public $timestamps = false;

}