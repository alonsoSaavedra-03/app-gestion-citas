<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Diagnostico;
use App\Models\Medico;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::with(['diagnostico', 'medico'])->get();

        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();

        return view('tratamientos.create', compact('diagnosticos', 'medicos'));
    }

    public function store(Request $request)
    {
        Tratamiento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'duracion' => $request->duracion,
            'diagnostico_id' => $request->diagnostico_id,
            'medico_id' => $request->medico_id,
            'estado' => $request->estado,
            'frecuencia_administracion' => $request->frecuencia_administracion,
        ]);

        return redirect('/tratamientos');
    }

    public function edit($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $diagnosticos = Diagnostico::all();
        $medicos = Medico::all();

        return view('tratamientos.edit', compact('tratamiento', 'diagnosticos', 'medicos'));
    }

    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);

        $tratamiento->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'duracion' => $request->duracion,
            'diagnostico_id' => $request->diagnostico_id,
            'medico_id' => $request->medico_id,
            'estado' => $request->estado,
            'frecuencia_administracion' => $request->frecuencia_administracion,
        ]);

        return redirect('/tratamientos');
    }

    public function destroy($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->delete();

        return redirect('/tratamientos');
    }
}