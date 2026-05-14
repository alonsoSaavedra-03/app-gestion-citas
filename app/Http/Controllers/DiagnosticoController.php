<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index()
    {
        $diagnosticos = Diagnostico::with(['paciente', 'medico'])->get();

        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('diagnosticos.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        Diagnostico::create([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'gravedad' => $request->gravedad,
            'recomendaciones' => $request->recomendaciones,
            'tipo_diagnostico' => $request->tipo_diagnostico,
        ]);

        return redirect('/diagnosticos');
    }

    public function edit($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('diagnosticos.edit', compact('diagnostico', 'pacientes', 'medicos'));
    }

    public function update(Request $request, $id)
    {
        $diagnostico = Diagnostico::findOrFail($id);

        $diagnostico->update([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'gravedad' => $request->gravedad,
            'recomendaciones' => $request->recomendaciones,
            'tipo_diagnostico' => $request->tipo_diagnostico,
        ]);

        return redirect('/diagnosticos');
    }

    public function destroy($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->delete();

        return redirect('/diagnosticos');
    }
}