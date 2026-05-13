<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Diagnostico;
use App\Models\Cita;
use App\Models\Tratamiento;


class Medico extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'telefono',
        'email',
        'licencia',
        'anios_experiencia'
    ];

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function diagnosticos(){
        return $this->hasMany(Diagnostico::class);
    }

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }
}
