<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    /**
     * Determine si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        // CAMBIAR A TRUE: De lo contrario, Laravel bloqueará la actualización.
        return true; 
    }

    /**
     * Reglas de validación para la actualización.
     */
    public function rules(): array
    {
        return [
            // Usamos 'sometimes' o quitamos 'required' para que solo se valide lo que se envía
            'nombre'           => 'sometimes|string|max:255',
            'apellido'         => 'sometimes|string|max:255',
            'fecha_nacimiento' => 'sometimes|date',
            'genero'           => 'sometimes|string',
            'telefono'         => 'nullable|string',
            'direccion'        => 'nullable|string',
            'tipo_sangre'      => 'nullable|string|max:5',
        ];
    }
}
