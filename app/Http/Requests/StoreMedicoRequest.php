<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // CAMBIO CRÍTICO: Debe ser true para permitir el registro
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nombre'            => 'required|string|max:255',
            'apellido'          => 'required|string|max:255',
            'especialidad'      => 'required|string|max:255',
            'telefono'          => 'nullable|string',
            'email'             => 'required|email|unique:medicos,email',
            'licencia'          => 'required|string|unique:medicos,licencia',
            'anios_experiencia' => 'required|integer|min:0',
        ];
    }
}