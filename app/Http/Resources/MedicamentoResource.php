<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicamentoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'farmaco' => $this->nombre,
            'prescripcion' => [
                'dosis' => $this->dosis,
                'frecuencia' => $this->frecuencia,
                'duracion' => $this->duracion ?? 'Indefinida'
            ],
            'info_adicional' => [
                'proveedor' => $this->proveedor,
                'efectos' => $this->efectos_secundarios
            ],
            'tratamiento_asociado' => $this->tratamiento ? $this->tratamiento->nombre : 'N/A'
        ];
    }
}
