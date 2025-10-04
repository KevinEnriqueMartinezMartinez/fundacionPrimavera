<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    use HasFactory;

    protected $table ='clientes';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
    ];
}
