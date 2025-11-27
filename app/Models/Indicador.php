<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $table = 'indicadores';
    protected $primaryKey = "id";
    public $timestamps = false;
    
    protected $fillable = [
        'nombre',
        'idDimension'
    ];

    public function dimension(){
        return $this->belongsTo(Dimension::class, 'idDimension');
    }
}
