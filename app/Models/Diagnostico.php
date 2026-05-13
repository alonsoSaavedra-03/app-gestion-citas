<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Tratamiento;

class Diagnostico extends Model
{
    protected $fillable = [
        'descripcion',
        'fecha',
        'paciente_id',
        'medico_id',
        'gravedad',
        'recomendaciones',
        'tipo_diagnostico'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }
}