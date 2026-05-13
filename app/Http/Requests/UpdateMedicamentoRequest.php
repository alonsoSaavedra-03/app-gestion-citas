<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicamentoRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'             => 'sometimes|string|max:255',
            'dosis'              => 'sometimes|string|max:255',
            'frecuencia'         => 'sometimes|string|max:255',
            'duracion'           => 'nullable|string|max:255',
            'tratamiento_id'     => 'sometimes|exists:tratamientos,id',
            'proveedor'          => 'nullable|string|max:255',
            'efectos_secundarios' => 'nullable|string',
        ];
    }
}
