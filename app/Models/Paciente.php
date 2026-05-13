<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnostico;
use App\Models\Cita;

class Paciente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'direccion',
        'tipo_sangre'
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function diagnosticos(){
        return $this->hasMany(Diagnostico::class);
    }
}
