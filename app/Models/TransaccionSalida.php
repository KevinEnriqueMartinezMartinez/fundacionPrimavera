<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionSalida extends Model
{
    use HasFactory;

    protected $table = 'transacciones_salida';
    protected $primaryKey = "id";
    public $timestamps = false;
    
    protected $fillable = [
        'cliente_id',
        'articulo_id',
        'cantidad',
        'fecha',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
