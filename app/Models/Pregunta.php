<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table ='preguntas';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = ['pregunta','idIndicador'];

    public function indicador(){
        return $this->belongsTo(Indicador::class, 'idIndicador');
    }

    public function respuestas(){
        return $this->hasMany(Respuesta::class, 'idPregunta');
    }
}
