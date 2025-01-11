<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Profesor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);


        $fotoPath = null;

        // Manejo de la foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $fotoPath = $filename; // Asigna la ruta de la foto
        }

        if ($request->role === 'representante') {
            $request->validate([
                'telefono_representante' => 'required|string|regex:/^[0-9]{10}$/',
                'edad' => 'required|integer',
                'fecha_nacimiento' => 'required|date',
                'direccion' => 'required|string|max:255',
                'cedula' => 'required|string|max:255',
            ]);
        } elseif ($request->role === 'profesor') {
            $request->validate([
                'edad' => 'required|integer',
                'fecha_nacimiento' => 'required|date',
                'direccion' => 'required|string|max:255',
                'cedula' => 'required|string|max:255',
                'telefono_profesor' => 'required|string|regex:/^[0-9]{10}$/',
                'tipo_profesor' => 'required|string|in:regular,deportes',
                'grado_asignado' => 'string|max:255',
            ]);
        }
        switch ($request->role) {
            case 'admin':
                Admin::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'foto' => $fotoPath,                    
                ]);
                break;

            case 'profesor':
                Profesor::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'edad' => $request->edad,
                    'grado_asignado' => $request->grado_asignado,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'direccion' => $request->direccion,
                    'cedula' => $request->cedula,
                    'telefono_profesor' => $request->telefono_profesor,
                    'foto' => $fotoPath,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'tipo_profesor' => $request->tipo_profesor,
                ]);
                break;

            case 'representante':
                User::create([
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'edad' => $request->edad,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'direccion' => $request->direccion,
                    'cedula' => $request->cedula,
                    'telefono_representante' => $request->telefono_representante,
                    'foto' => $fotoPath,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                break;
        }

        return redirect()->route('admin.dashboard')->with('success', 'Registration successful!');
    }

    
}
