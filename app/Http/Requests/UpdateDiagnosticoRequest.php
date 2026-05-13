<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiagnosticoRequest extends FormRequest
{
    public function authorize(): bool { 
        return true; 
    }

    public function rules(): array
    {
        return [
            'descripcion'      => 'sometimes|string',
            'fecha'            => 'sometimes|date_format:Y-m-d H:i:s',
            'paciente_id'      => 'sometimes|exists:pacientes,id',
            'medico_id'        => 'sometimes|exists:medicos,id',
            'gravedad'         => 'sometimes|string',
            'recomendaciones'  => 'nullable|string',
            'tipo_diagnostico' => 'sometimes|string'
        ];
    }
}
