<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        Medico::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'especialidad' => $request->especialidad,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'licencia' => $request->licencia,
            'anios_experiencia' => $request->anios_experiencia,
        ]);

        return redirect('/medicos');
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);

        $medico->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'especialidad' => $request->especialidad,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'licencia' => $request->licencia,
            'anios_experiencia' => $request->anios_experiencia,
        ]);

        return redirect('/medicos');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect('/medicos');
    }
}