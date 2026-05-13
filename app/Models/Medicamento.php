<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tratamiento;


class Medicamento extends Model
{
    protected $fillable = [
        'nombre',
        'dosis',
        'frecuencia',
        'duracion',
        'tratamiento_id',
        'proveedor',
        'efectos_secundarios'
    ];

    public function tratamiento(){
        return $this->belongsTo(Tratamiento::class);
    }
}