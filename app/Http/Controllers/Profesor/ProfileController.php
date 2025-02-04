<?php

namespace App\Http\Controllers\Profesor;

use App\Models\Profesor;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfesorProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profesor.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfesorProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::guard('profesor')->user(); 
    
        // Llenar el usuario con los datos validados
        $user->fill($request->validated());
    
        // Si el email ha cambiado, restablecer la verificación
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // Manejar la carga de la foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $user->foto = $filename; // Actualiza el campo 'foto' en el modelo
        }
    
        // Guardar los cambios
        $user->save();
    
        return Redirect::route('profesor.profile.edit')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request): RedirectResponse
{
    $request->validate([
        'current_password' => ['required', 'string'],
        'password' => ['required', 'string', 'min:8', 'confirmed'], // Asegúrate de que la nueva contraseña tenga al menos 8 caracteres
    ]);

    $user = Auth::guard('profesor')->user();

    // Verificar la contraseña actual
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
    }

    // Actualizar la contraseña
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('profesor.profile.edit')->with('status', 'password-updated');
}
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
