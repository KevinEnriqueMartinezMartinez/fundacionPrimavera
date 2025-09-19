<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    protected $table ='unidadmedida';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = ['unidad'];
}
