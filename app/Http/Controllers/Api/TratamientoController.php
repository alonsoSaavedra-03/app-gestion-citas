<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tratamiento;
use App\Http\Requests\StoreTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
use App\Http\Resources\TratamientoResource;

class TratamientoController extends Controller
{
    public function index()
    {
        return TratamientoResource::collection(Tratamiento::with(['diagnostico', 'medico'])->get());
    }

    public function store(StoreTratamientoRequest $request)
    {
        $tratamiento = Tratamiento::create($request->validated());
        return new TratamientoResource($tratamiento);
    }

    public function show(Tratamiento $tratamiento)
    {
        return new TratamientoResource($tratamiento->load(['diagnostico', 'medico']));
    }

    public function update(UpdateTratamientoRequest $request, Tratamiento $tratamiento)
    {
        $tratamiento->update($request->validated());
        return new TratamientoResource($tratamiento);
    }

    public function destroy(Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        return response()->json(['mensaje' => 'Tratamiento eliminado correctamente'], 200);
    }
}
