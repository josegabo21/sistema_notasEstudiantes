<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    // Método para actualizar el perfil del administrador
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->nombre = $request->nombre;
        $admin->apellido = $request->apellido;
        $admin->email = $request->email;

        if ($request->hasFile('foto')) {
            // Eliminar la foto anterior si existe
            if ($admin->foto) {
                File::delete(public_path('images/' . $admin->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $admin->foto = $filename;
        }

        $admin->save();

        return redirect()->route('admin.view')->with('success', 'Perfil actualizado exitosamente.');
    }
}