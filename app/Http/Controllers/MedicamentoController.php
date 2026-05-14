<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::with('tratamiento')->get();

        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        $tratamientos = Tratamiento::all();

        return view('medicamentos.create', compact('tratamientos'));
    }

    public function store(Request $request)
    {
        Medicamento::create([
            'nombre' => $request->nombre,
            'dosis' => $request->dosis,
            'frecuencia' => $request->frecuencia,
            'duracion' => $request->duracion,
            'tratamiento_id' => $request->tratamiento_id,
            'proveedor' => $request->proveedor,
            'efectos_secundarios' => $request->efectos_secundarios,
        ]);

        return redirect('/medicamentos');
    }

    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $tratamientos = Tratamiento::all();

        return view('medicamentos.edit', compact('medicamento', 'tratamientos'));
    }

    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);

        $medicamento->update([
            'nombre' => $request->nombre,
            'dosis' => $request->dosis,
            'frecuencia' => $request->frecuencia,
            'duracion' => $request->duracion,
            'tratamiento_id' => $request->tratamiento_id,
            'proveedor' => $request->proveedor,
            'efectos_secundarios' => $request->efectos_secundarios,
        ]);

        return redirect('/medicamentos');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        return redirect('/medicamentos');
    }
}