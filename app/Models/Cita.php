<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;

class Cita extends Model
{
    protected $fillable = [
        'fecha',
        'motivo',
        'paciente_id',
        'medico_id',
        'estado',
        'observaciones',
        'sala'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }
}