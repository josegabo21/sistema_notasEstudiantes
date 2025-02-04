<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('original_name'); // Nombre original del archivo
            $table->string('stored_name'); // Nombre con el que se guarda en el servidor
            $table->string('path'); // Ruta del archivo
            $table->string('lapso'); // Campo para el lapso
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('files'); // Eliminar la tabla si se revierte la migración
    }
};
