<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseArticulo extends Model
{
    use HasFactory;
    protected $table ='clasearticulo';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = ['clase'];
}
