<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Http\Resources\CitaResource;

class CitaController extends Controller
{
    public function index()
    {
        return CitaResource::collection(Cita::with(['paciente', 'medico'])->get());
    }

    public function store(StoreCitaRequest $request)
    {
        $cita = Cita::create($request->validated());
        return new CitaResource($cita);
    }

    public function show(Cita $cita)
    {
        return new CitaResource($cita->load(['paciente', 'medico']));
    }

    public function update(UpdateCitaRequest $request, Cita $cita)
    {
        $cita->update($request->validated());
        return new CitaResource($cita);
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return response()->json(['mensaje' => 'Cita eliminada correctamente'], 200);
    }
}
