<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CitaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fecha_cita' => $this->fecha,
            'motivo' => $this->motivo,
            'paciente' => $this->paciente ? $this->paciente->nombre . ' ' . $this->paciente->apellido : 'No asignado',
            'medico' => $this->medico ? 'Dr(a). ' . $this->medico->nombre . ' ' . $this->medico->apellido : 'No asignado',
            'estado' => $this->estado,
            'detalles' => [
                'sala' => $this->sala ?? 'Por asignar',
                'obs' => $this->observaciones
            ]
        ];
    }
}

