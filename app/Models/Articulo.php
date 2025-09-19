<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table ='articulo';
    protected $primaryKey = "id";
   	public $timestamps = false;

    protected $fillable = [
        'sku',
        'descripcion',
        'tipo_articulo_id',
        'unidad_medida_id',
        'clase_articulo_id',
        'marca_id',
        'proveedor_id',
        'precio_compra',
        'precio_venta'
    ];

    public function tipoArticulo()
    {
        return $this->belongsTo(TipoArticulo::class, 'tipo_articulo_id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id');
    }

    public function claseArticulo()
    {
        return $this->belongsTo(ClaseArticulo::class, 'clase_articulo_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
