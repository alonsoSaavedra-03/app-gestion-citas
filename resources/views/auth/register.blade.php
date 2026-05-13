@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.bunny.net/css?family=dm-serif-display:400,400i|dm-sans:300,400,500');

    :root {
        --cream: #F9F6F0;
        --stone: #E8E2D9;
        --sage: #6B8F71;
        --sage-dark: #4A6B50;
        --sage-light: #EBF2EC;
        --text-dark: #1C1C1A;
        --text-mid: #5A5750;
        --text-light: #9A9590;
        --error: #C0392B;
    }

    .register-wrap {
        min-height: 100vh;
        display: flex;
        background: var(--cream);
        font-family: 'DM Sans', sans-serif;
    }

    /* Panel izquierdo */
    .register-panel-left {
        display: none;
        width: 38%;
        background: var(--sage-dark);
        position: relative;
        overflow: hidden;
        flex-direction: column;
        justify-content: flex-end;
        padding: 3rem;
    }

    @media (min-width: 900px) {
        .register-panel-left { display: flex; }
    }

    .panel-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.1;
        background-image:
            radial-gradient(circle, rgba(255,255,255,0.5) 1px, transparent 1px);
        background-size: 28px 28px;
    }

    .panel-circle-top {
        position: absolute;
        top: -100px; right: -100px;
        width: 360px; height: 360px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .panel-circle-mid {
        position: absolute;
        top: 40px; right: -160px;
        width: 360px; height: 360px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.07);
    }

    .panel-content { position: relative; z-index: 2; }

    .panel-logo {
        font-family: 'DM Serif Display', serif;
        font-size: 1.35rem;
        color: #fff;
        margin-bottom: 3.5rem;
        letter-spacing: -0.01em;
    }
    .panel-logo span { opacity: 0.65; }

    .panel-steps {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        margin-bottom: 0;
    }

    .panel-step {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .step-dot {
        width: 28px; height: 28px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .step-dot svg { color: rgba(255,255,255,0.85); }

    .step-text strong {
        display: block;
        font-size: 0.88rem;
        font-weight: 500;
        color: rgba(255,255,255,0.9);
        margin-bottom: 0.15rem;
    }
    .step-text span {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.5);
        line-height: 1.5;
    }

    /* Panel derecho */
    .register-panel-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2.5rem 1.5rem;
    }

    .register-box {
        width: 100%;
        max-width: 420px;
        animation: fadeUp 0.45s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .register-header { margin-bottom: 2rem; }

    .register-eyebrow {
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--sage);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.65rem;
    }
    .register-eyebrow::before {
        content: '';
        display: block;
        width: 20px; height: 1px;
        background: var(--sage);
    }

    .register-title {
        font-family: 'DM Serif Display', serif;
        font-size: 2rem;
        letter-spacing: -0.02em;
        color: var(--text-dark);
        line-height: 1.1;
    }

    /* Errores globales */
    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        margin-bottom: 1.25rem;
        font-size: 0.83rem;
        color: var(--error);
    }
    .alert-error ul { padding-left: 1rem; }

    /* Campos */
    .field-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .field-full {
        grid-column: 1 / -1;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }

    .field label {
        font-size: 0.79rem;
        font-weight: 500;
        color: var(--text-mid);
        letter-spacing: 0.02em;
    }

    .field input {
        width: 100%;
        padding: 0.68rem 0.875rem;
        border: 1px solid var(--stone);
        border-radius: 8px;
        background: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.875rem;
        color: var(--text-dark);
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }
    .field input::placeholder { color: var(--text-light); }
    .field input:focus {
        border-color: var(--sage);
        box-shadow: 0 0 0 3px rgba(107,143,113,0.12);
    }
    .field input.is-invalid { border-color: var(--error); }

    .field-error {
        font-size: 0.75rem;
        color: var(--error);
    }

    /* Password hint */
    .password-hint {
        font-size: 0.75rem;
        color: var(--text-light);
        margin-top: 0.2rem;
    }

    /* Submit */
    .btn-submit {
        width: 100%;
        padding: 0.8rem;
        background: var(--sage);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        box-shadow: 0 2px 10px rgba(107,143,113,0.25);
        margin-top: 0.5rem;
        margin-bottom: 1.5rem;
    }
    .btn-submit:hover {
        background: var(--sage-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 18px rgba(107,143,113,0.35);
    }
    .btn-submit:active { transform: translateY(0); }

    /* Login link */
    .login-prompt {
        text-align: center;
        font-size: 0.85rem;
        color: var(--text-light);
    }
    .login-prompt a {
        color: var(--sage);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .login-prompt a:hover { color: var(--sage-dark); }

    /* Terms */
    .terms-note {
        text-align: center;
        font-size: 0.75rem;
        color: var(--text-light);
        margin-bottom: 1.25rem;
        line-height: 1.6;
    }

    /* Mobile logo */
    .mobile-logo {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem;
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 1.75rem;
    }
    .mobile-logo span { color: var(--sage); }

    @media (min-width: 900px) {
        .mobile-logo { display: none; }
    }

    @media (max-width: 480px) {
        .field-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="register-wrap">

    {{-- Panel izquierdo --}}
    <div class="register-panel-left">
        <div class="panel-pattern"></div>
        <div class="panel-circle-top"></div>
        <div class="panel-circle-mid"></div>
        <div class="panel-content">
            <div class="panel-logo">Centro<span>Médico</span></div>
            <div class="panel-steps">
                <div class="panel-step">
                    <div class="step-dot">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <div class="step-text">
                        <strong>Crea tu perfil</strong>
                        <span>Registra tus datos personales de forma segura.</span>
                    </div>
                </div>
                <div class="panel-step">
                    <div class="step-dot">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <div class="step-text">
                        <strong>Agenda tu cita</strong>
                        <span>Elige especialidad, médico y horario disponible.</span>
                    </div>
                </div>
                <div class="panel-step">
                    <div class="step-dot">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                    <div class="step-text">
                        <strong>Accede a tus resultados</strong>
                        <span>Consulta tu historial clínico en cualquier momento.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Panel derecho --}}
    <div class="register-panel-right">
        <div class="register-box">

            <div class="mobile-logo">Centro<span>Médico</span></div>

            <div class="register-header">
                <p class="register-eyebrow">Portal de pacientes</p>
                <h1 class="register-title">Crear cuenta</h1>
            </div>

            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field-grid">

                    {{-- Nombre --}}
                    <div class="field field-full">
                        <label for="name">Nombre completo</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Juan García"
                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                            required
                            autocomplete="name"
                            autofocus
                        >
                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="field field-full">
                        <label for="email">Correo electrónico</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@correo.com"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                            required
                            autocomplete="email"
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div class="field">
                        <label for="password">Contraseña</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            required
                            autocomplete="new-password"
                        >
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @else
                            <span class="password-hint">Mínimo 8 caracteres</span>
                        @enderror
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="field">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input
                            id="password-confirm"
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        >
                    </div>

                </div>

                <p class="terms-note">
                    Al registrarte aceptas nuestros términos de uso y política de privacidad.
                </p>

                <button type="submit" class="btn-submit">Crear mi cuenta</button>
            </form>

            @if (Route::has('login'))
                <p class="login-prompt">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            @endif

        </div>
    </div>

</div>
@endsection