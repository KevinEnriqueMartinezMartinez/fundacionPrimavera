<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluaciones';

    protected $fillable = [
        'fecha',
        'tipo',
        'estado',
        'idDimension',
        'idFicha',
        'idUsuario',
        'idIndicador'
    ];

    public $timestamps = false;

    public function ficha(){
        return $this->belongsTo(Beneficiario::class, 'idFicha');
    }

    public function dimension(){
        return $this->belongsTo(Dimension::class, 'idDimension');
    }
}
