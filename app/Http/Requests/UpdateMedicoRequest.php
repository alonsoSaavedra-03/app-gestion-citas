<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // CAMBIO CRÍTICO: Debe ser true para permitir la actualización
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Obtenemos el ID del médico desde la ruta para la validación de campos únicos
        $medicoId = $this->route('medico')->id;

        return [
            'nombre'            => 'sometimes|string|max:255',
            'apellido'          => 'sometimes|string|max:255',
            'especialidad'      => 'sometimes|string|max:255',
            'telefono'          => 'nullable|string',
            // Validamos que sea único pero ignoramos el ID actual
            'email'             => 'sometimes|email|unique:medicos,email,' . $medicoId,
            'licencia'          => 'sometimes|string|unique:medicos,licencia,' . $medicoId,
            'anios_experiencia' => 'sometimes|integer|min:0',
        ];
    }
}
