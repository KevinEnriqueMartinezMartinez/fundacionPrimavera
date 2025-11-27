<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $table ='respuestas';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = [
        'respuesta',
        'respuesta',
        'puntuacion',
        'interpretacion',
        'idPregunta'
    ];

    public function pregunta(){
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }
}
