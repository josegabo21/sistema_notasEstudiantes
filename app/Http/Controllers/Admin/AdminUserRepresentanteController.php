<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AdminUserRepresentanteController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.usuarios.representante', compact('users')); 
    }

    public function showUsers($id)
    {

        $users = User::findOrFail($id);
        return view('admin.usuarios.representante', compact('users')); 
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('admin.usuarios.representante')->with('success', 'Representante eliminado correctamente.');
    }
    
}