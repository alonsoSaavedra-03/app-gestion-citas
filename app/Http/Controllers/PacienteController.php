<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes.index', compact('pacientes'));
    }

    public function store(Request $request)
    {
        Http::post('http://127.0.0.1:8000/api/pacientes', [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ]);

        return redirect('/pacientes');
    }
}
