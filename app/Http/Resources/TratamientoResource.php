<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TratamientoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tratamiento_nombre' => $this->nombre,
            'descripcion' => $this->descripcion ?? 'Sin descripción',
            'duracion_estimada' => $this->duracion,
            'frecuencia' => $this->frecuencia_administracion,
            'estado_actual' => $this->estado,
            'relacionado_con' => [
                'diagnostico_id' => $this->diagnostico_id,
                'diagnostico_desc' => $this->diagnostico ? $this->diagnostico->descripcion : 'N/A'
            ],
            'medico_responsable' => $this->medico ? 'Dr(a). ' . $this->medico->nombre . ' ' . $this->medico->apellido : 'N/A'
        ];
    }
}

