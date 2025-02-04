<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Profesor;
use App\Models\student;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $admin = Admin::find(auth()->id());

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Obtener el total de profesores
        $totalProfesores = Profesor::count();
        // Obtener el total de representantes
        $totalRepresentantes = User::count(); // Asegúrate de que esto sea correcto según tu modelo

        $totalEstudiantes = student::count();
        // Retornar la vista del dashboard con las variables

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $admin->foto = $filename;
            
        }
    
        $admin->save();

        return view('admin.dashboard', compact('admin', 'totalProfesores', 'totalRepresentantes', 'totalEstudiantes'));
    }
}