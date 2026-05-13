<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'fecha'       => 'required|date_format:Y-m-d H:i:s',
            'motivo'      => 'required|string|max:255',
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id'   => 'required|exists:medicos,id',
            'estado'      => 'required|string|in:Pendiente,Confirmada,Cancelada,Completada',
            'observaciones' => 'nullable|string',
            'sala'        => 'nullable|string|max:50',
        ];
    }
}