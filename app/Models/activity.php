<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'tipo', 'grado','fecha','hora_de_inicio','hora_de_cierre'];

    protected $table = "students";
}
