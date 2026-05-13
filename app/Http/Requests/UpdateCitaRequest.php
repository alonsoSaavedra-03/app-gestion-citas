<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'fecha'       => 'sometimes|date_format:Y-m-d H:i:s',
            'motivo'      => 'sometimes|string|max:255',
            'paciente_id' => 'sometimes|exists:pacientes,id',
            'medico_id'   => 'sometimes|exists:medicos,id',
            'estado'      => 'sometimes|string|in:Pendiente,Confirmada,Cancelada,Completada',
            'observaciones' => 'nullable|string',
            'sala'        => 'nullable|string|max:50',
        ];
    }
}