<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticoRequest extends FormRequest
{
    public function authorize(): bool { 
        return true; // Siguiendo el paso #9 de la guía
    }

    public function rules(): array
    {
        return [
            'descripcion'      => 'required|string',
            'fecha'            => 'required|date_format:Y-m-d H:i:s',
            'paciente_id'      => 'required|exists:pacientes,id',
            'medico_id'        => 'required|exists:medicos,id',
            'gravedad'         => 'required|string',
            'recomendaciones'  => 'nullable|string',
            'tipo_diagnostico' => 'required|string'
        ];
    }
}
