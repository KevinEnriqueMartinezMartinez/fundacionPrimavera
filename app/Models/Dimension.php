<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    protected $table ='dimensiones';
    protected $primaryKey = "id";
   	public $timestamps = false;
    protected $fillable = ['dimension'];
}
