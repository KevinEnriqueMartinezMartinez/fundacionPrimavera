<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table ='distritos';
    protected $primaryKey = "id";
   	public $timestamps = false;

    protected $fillable = [
        'nombre',
        'idMunicipio'
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'idMunicipio');
    }

}
