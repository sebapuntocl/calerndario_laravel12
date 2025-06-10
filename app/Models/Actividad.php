<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $fillable = ['titulo', 'fecha', 'hora', 'descripcion'];
    protected $table = 'actividades';
}
