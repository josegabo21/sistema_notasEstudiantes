<?php

namespace App\Http\Requests;

use App\Models\Profesor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfesorProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'], // Validación para el apellido
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(Profesor::class)->ignore($this->user()->id),
            ],
            'edad' => ['nullable', 'integer'], // Agregar validación para edad
            'cedula' => ['nullable', 'string', 'max:20'], // Agregar validación para cédula
            'direccion' => ['nullable', 'string', 'max:255'], // Agregar validación para dirección
            'telefono_profesor' => ['nullable', 'string', 'max:15'], // Agregar validación para teléfono
            'foto' => ['nullable', 'image', 'max:2048'], // Validación para la foto (opcional)
            
        ];
    }
}
