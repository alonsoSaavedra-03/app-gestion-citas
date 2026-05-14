<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GithubLoginController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/login/github', [GithubLoginController::class, 'redirectToGithub']);
Route::get('/login/github/callback', [GithubLoginController::class, 'handleGithubCallback']);

Route::get('/pacientes', [PacienteController::class, 'index']);
Route::get('/pacientes/create', [PacienteController::class, 'create']);
Route::post('/pacientes', [PacienteController::class, 'store']);


require __DIR__.'/auth.php';
