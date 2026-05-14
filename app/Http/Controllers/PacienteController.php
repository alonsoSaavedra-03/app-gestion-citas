<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
{
    Paciente::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'genero' => $request->genero,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'tipo_sangre' => $request->tipo_sangre,
    ]);

    return redirect('/pacientes');
}

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
{
    $paciente = Paciente::findOrFail($id);

    $paciente->update([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'genero' => $request->genero,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
        'tipo_sangre' => $request->tipo_sangre,
    ]);

    return redirect('/pacientes');
}
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        $paciente->delete();

        return redirect('/pacientes');
    }
}