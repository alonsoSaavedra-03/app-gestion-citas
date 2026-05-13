<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Obligatorio según la guía
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'telefono' => 'nullable|string',
            'direccion' => 'nullable|string',
            'tipo_sangre' => 'nullable|string|max:5',
        ];
    }
}
