<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosVariantes extends Model
{
    use HasFactory;
    protected $table = "productos_variantes";
    protected $fillable = ["id","producto_id","referencia","descripcion","precio"];

    function productos()
    {
        return $this->belongsTo(Productos::class);
    }
}
