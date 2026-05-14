<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Resources\PacienteResource;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // GET: api/pacientes
    public function index()
    {
        $pacientes = Paciente::all();
        return PacienteResource::collection($pacientes);
    }

    // POST: api/pacientes
    public function store(StorePacienteRequest $request)
    {
        $paciente = Paciente::create($request->validated());
        return new PacienteResource($paciente);
    }

    // GET: api/pacientes/{id}
    public function show(Paciente $paciente)
    {
        return new PacienteResource($paciente);
    }

    // PUT: api/pacientes/{id}
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->update($request->all());
        return new PacienteResource($paciente);
    }

    // DELETE: api/pacientes/{id}
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json([
            'res' => true,
            'mensaje' => 'Paciente eliminado correctamente'
        ], 200);
    }
}