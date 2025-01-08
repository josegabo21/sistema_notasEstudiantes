<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AdminUserProfesorController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener todos los profesores si es necesario
        $profesores = Profesor::all();
        return view('admin.usuarios.profesor', compact('profesores'));
    }

    public function showProfesores($id)
    {
        $profesor = Profesor::findOrFail($id); // Asegúrate de que el ID sea válido
        return view('admin.usuarios.profesor', compact('profesores')); // Asegúrate de que la vista exista
    }

    public function showAsignarGrados($id)
    {
        // Cargar solo el profesor específico
        $profesor = Profesor::find($id); // Asegúrate de que el ID sea válido
        return view('admin.usuarios.asignar_grados', compact('profesor')); // Cambia esto por la ruta correcta a tu vista
    }


    public function assignGrades(Request $request)
    {
        $request->validate([
            'grados' => 'required|array',
            'grados.*.id' => 'required|exists:profesors,id',
            'grados.*.grado_asignado' => 'required|string',
        ]);

        foreach ($request->grados as $grado) {
            $profesor = Profesor::findOrFail($grado['id']);
            $profesor->grado_asignado = $grado['grado_asignado'];
            $profesor->save();
        }

        return redirect()->route('admin.usuarios.profesor');
    }

}