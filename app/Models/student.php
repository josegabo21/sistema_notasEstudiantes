<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "apellido",
        "edad",
        "grado",
        "fecha_nacimiento",
        'cedula',
        "direccion",
        "telefono_representante",
        'foto',
    ];
    protected $table = "students";
}
