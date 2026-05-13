<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnostico;
use App\Models\Medico;
use App\Models\Medicamento;


class Tratamiento extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'duracion',
        'diagnostico_id',
        'medico_id',
        'estado',
        'frecuencia_administracion'
    ];

    public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function medicamentos(){
        return $this->hasMany(Medicamento::class);
    }
}
