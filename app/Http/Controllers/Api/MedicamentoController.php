<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicamento;
use App\Http\Requests\StoreMedicamentoRequest;
use App\Http\Requests\UpdateMedicamentoRequest;
use App\Http\Resources\MedicamentoResource;

class MedicamentoController extends Controller
{
    public function index()
    {
        return MedicamentoResource::collection(Medicamento::all());
    }

    public function store(StoreMedicamentoRequest $request)
    {
        $medicamento = Medicamento::create($request->validated());
        return new MedicamentoResource($medicamento);
    }

    public function show(Medicamento $medicamento)
    {
        return new MedicamentoResource($medicamento);
    }

    public function update(UpdateMedicamentoRequest $request, Medicamento $medicamento)
    {
        $medicamento->update($request->validated());
        return new MedicamentoResource($medicamento);
    }

    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return response()->json(['mensaje' => 'Medicamento eliminado correctamente'], 200);
    }
}
