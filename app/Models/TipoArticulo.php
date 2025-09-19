<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoArticulo extends Model
{
    use HasFactory;

    protected $table ='tipoarticulo';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = ['tipo'];
}
