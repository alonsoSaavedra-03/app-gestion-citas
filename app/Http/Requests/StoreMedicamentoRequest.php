<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicamentoRequest extends FormRequest
{
    public function authorize(): bool {
        return true; // Importante para evitar el Error 403
    }

    public function rules(): array
    {
        return [
            'nombre'             => 'required|string|max:255',
            'dosis'              => 'required|string|max:255',
            'frecuencia'         => 'required|string|max:255',
            'duracion'           => 'nullable|string|max:255',
            'tratamiento_id'     => 'required|exists:tratamientos,id',
            'proveedor'          => 'nullable|string|max:255',
            'efectos_secundarios' => 'nullable|string',
        ];
    }
}