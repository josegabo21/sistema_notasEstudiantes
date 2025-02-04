<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function uploadWord(Request $request)
{
    $request->validate([
        'word_file' => 'required|file|mimes:docx,doc',
        'lapso' => 'required|string',
    ]);

    // Guardar el archivo en el directorio 'public/uploads'
    $file = $request->file('word_file');
    $storedName = 'plantilla_' . $request->lapso . '.docx'; // Cambiar a .docx
    $filePath = $file->move(public_path('uploads'), $storedName);

    // Guardar información en la base de datos
    File::create([
        'original_name' => $file->getClientOriginalName(),
        'stored_name' => $storedName,
        'path' => $filePath,
        'lapso' => $request->lapso, // Asegúrate de guardar el lapso
    ]);

    return response()->json(['success' => true, 'message' => 'Archivo subido exitosamente.']);
}

public function downloadWord($lapso)
{
    $filePath = public_path('uploads/plantilla_' . $lapso . '.docx'); // Cambiar a .docx

    // Verificar si el archivo existe
    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return back()->with('error', 'El archivo no existe.');
    }
}

public function updateWord(Request $request)
{
    $request->validate([
        'word_file' => 'required|file|mimes:docx,doc',
        'lapso' => 'required|string',
    ]);

    // Lógica para encontrar el archivo existente
    $existingFile = File::where('lapso', $request->lapso)->first();

    if ($existingFile) {
        // Eliminar el archivo anterior
        if (file_exists($existingFile->path)) {
            unlink($existingFile->path);
        }

        // Guardar el nuevo archivo
        $file = $request->file('word_file');
        $storedName = 'plantilla_' . $request->lapso . '.docx'; // Cambiar a .docx
        $filePath = $file->move(public_path('uploads'), $storedName);

        // Actualizar la información en la base de datos
        $existingFile->update([
            'original_name' => $file->getClientOriginalName(),
            'stored_name' => $storedName,
            'path' => $filePath,
            'lapso' => $request->lapso,
        ]);

        return response()->json(['success' => true, 'message' => 'Archivo actualizado exitosamente.']);
    } else {
        return response()->json(['success' => false, 'message' => 'No se encontró el archivo para el lapso seleccionado.']);
    }
}
}