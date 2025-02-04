<?php

namespace App\Http\Controllers\Profesor;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Profesor;
use App\Models\student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $profesor = Profesor::find(auth()->id());

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profesor = auth()->user();
        // Obtener el total de profesores
        $totalProfesores = Profesor::count();
        // Obtener el total de representantes
        $totalRepresentantes = User::count(); // Asegúrate de que esto sea correcto según tu modelo

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $profesor->foto = $filename;
            
        }
    
        $profesor->save();
        
       // Contar estudiantes según el grado asignado
    if ($profesor->grado_asignado === 'Todos los grados') {
        // Contar todos los estudiantes
        $totalEstudiantes = Student::count();
    } else {
        // Contar solo los estudiantes del grado asignado
        $totalEstudiantes = Student::where('grado', $profesor->grado_asignado)->count();
    }

        return view('profesor.dashboard', compact('profesor', 'totalProfesores', 'totalRepresentantes', 'totalEstudiantes'));
    }
}