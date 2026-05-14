<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['paciente', 'medico'])->get();

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('citas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        Cita::create([
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
            'sala' => $request->sala,
        ]);

        return redirect('/citas');
    }

    public function edit($id)
    {
        $cita = Cita::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $cita->update([
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
            'sala' => $request->sala,
        ]);

        return redirect('/citas');
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect('/citas');
    }
}