<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTratamientoRequest extends FormRequest
{
    public function authorize(): bool {
        return true; // Paso #9 de la guía
    }

    public function rules(): array
    {
        return [
            'nombre'                    => 'required|string|max:255',
            'descripcion'               => 'nullable|string',
            'duracion'                  => 'nullable|string|max:255',
            'diagnostico_id'            => 'required|exists:diagnosticos,id',
            'medico_id'                 => 'required|exists:medicos,id',
            'estado'                    => 'required|string|in:Activo,Finalizado,Suspendido',
            'frecuencia_administracion' => 'nullable|string|max:255',
        ];
    }
}
