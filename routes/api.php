<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\CitaController;
use App\Http\Controllers\Api\DiagnosticoController;
use App\Http\Controllers\Api\TratamientoController;
use App\Http\Controllers\Api\MedicamentoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('medicos', MedicoController::class);
Route::apiResource('citas', CitaController::class);
Route::apiResource('diagnosticos', DiagnosticoController::class);
Route::apiResource('tratamientos', TratamientoController::class);
Route::apiResource('medicamentos', MedicamentoController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
