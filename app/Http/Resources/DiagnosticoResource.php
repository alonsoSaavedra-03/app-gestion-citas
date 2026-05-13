<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'detalle_medico' => [
                'descripcion' => $this->descripcion,
                'tipo' => $this->tipo_diagnostico,
                'gravedad' => $this->gravedad,
                'fecha' => $this->fecha
            ],
            'paciente' => $this->paciente ? $this->paciente->nombre . ' ' . $this->paciente->apellido : 'N/A',
            'atendido_por' => $this->medico ? 'Dr(a). ' . $this->medico->nombre . ' ' . $this->medico->apellido : 'N/A',
            'sugerencias' => $this->recomendaciones ?? 'Sin recomendaciones adicionales'
        ];
    }
}
