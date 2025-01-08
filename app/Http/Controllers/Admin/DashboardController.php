<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Profesor;
use App\Models\student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener el total de profesores
        $totalProfesores = Profesor::count();
        // Obtener el total de representantes
        $totalRepresentantes = User::count(); // Asegúrate de que esto sea correcto según tu modelo

        $totalEstudiantes = student::count();
        // Retornar la vista del dashboard con las variables
        return view('admin.dashboard', compact('totalProfesores', 'totalRepresentantes', 'totalEstudiantes'));
    }
}