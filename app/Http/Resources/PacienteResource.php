<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'paciente' => $this->nombre . ' ' . $this->apellido,
            'nacimiento' => $this->fecha_nacimiento,
            'genero' => $this->genero,
            'contacto' => [
                'tel' => $this->telefono,
                'dir' => $this->direccion
            ],
            'rh' => $this->tipo_sangre,
            'creado_el' => $this->created_at->format('d/m/Y')
        ];
    }
}
