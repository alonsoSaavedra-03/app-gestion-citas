<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTratamientoRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'                    => 'sometimes|string|max:255',
            'descripcion'               => 'nullable|string',
            'duracion'                  => 'nullable|string|max:255',
            'diagnostico_id'            => 'sometimes|exists:diagnosticos,id',
            'medico_id'                 => 'sometimes|exists:medicos,id',
            'estado'                    => 'sometimes|string|in:Activo,Finalizado,Suspendido',
            'frecuencia_administracion' => 'nullable|string|max:255',
        ];
    }
}
