<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue la convención plural
    protected $table = 'files';

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = [
        'original_name',
        'stored_name',
        'path',
        'lapso', // Agregar el campo 'lapso' aquí
    ];
}