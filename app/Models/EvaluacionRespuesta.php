<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluacionRespuesta extends Model
{
    protected $table = 'evaluaciones_respuestas';

    protected $fillable = [
        'idEvaluacion',
        'idPregunta',
        'idRespuesta'
    ];

    public $timestamps = false;

    public function pregunta(){
        return $this->belongsTo(Pregunta::class, 'idPregunta');
    }

    public function respuesta(){
        return $this->belongsTo(Respuesta::class, 'idRespuesta');
    }
}
