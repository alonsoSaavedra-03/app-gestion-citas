<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'doctor' => 'Dr(a). ' . $this->nombre . ' ' . $this->apellido,
            'especialidad' => $this->especialidad,
            'credenciales' => [
                'licencia' => $this->licencia,
                'experiencia' => $this->anios_experiencia . ' años'
            ],
            'contacto' => [
                'email' => $this->email,
                'tel' => $this->telefono ?? 'Sin teléfono'
            ]
        ];
    }
}
