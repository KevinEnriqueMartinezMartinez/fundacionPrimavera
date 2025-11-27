<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table ='fichasbeneficiarios';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = [
        'nombres',
        'apellidos',
        'fechaNacimiento',
        'genero',
        'fechaIngreso',
        'fechaSalida',
        'idComunidad',
        'idPrograma',
        'dui',
        'nit',
        'telefono',
        'nombre_responsable',
        'apellido_responsable',
        'dui_responsable',
        'telefono_responsable',
        'correo_responsable'
    ];

    public function programa(){
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

    public function comunidad(){
        return $this->belongsTo(Comunidad::class, 'idComunidad');
    }

}
