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
        --accent: #C17B4E;
        --error: #C0392B;
    }

    .login-wrap {
        min-height: 100vh;
        display: flex;
        background: var(--cream);
        font-family: 'DM Sans', sans-serif;
    }

    /* Panel izquierdo decorativo */
    .login-panel-left {
        display: none;
        width: 42%;
        background: var(--sage);
        position: relative;
        overflow: hidden;
        flex-direction: column;
        justify-content: flex-end;
        padding: 3rem;
    }

    @media (min-width: 900px) {
        .login-panel-left { display: flex; }
    }

    .panel-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.12;
        background-image:
            repeating-linear-gradient(
                45deg,
                transparent,
                transparent 28px,
                rgba(255,255,255,0.4) 28px,
                rgba(255,255,255,0.4) 29px
            ),
            repeating-linear-gradient(
                -45deg,
                transparent,
                transparent 28px,
                rgba(255,255,255,0.4) 28px,
                rgba(255,255,255,0.4) 29px
            );
    }

    .panel-circle-1 {
        position: absolute;
        top: -80px; right: -80px;
        width: 320px; height: 320px;
        border-radius: 50%;
        background: rgba(255,255,255,0.07);
    }
    .panel-circle-2 {
        position: absolute;
        bottom: 120px; left: -60px;
        width: 200px; height: 200px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
    }

    .panel-content {
        position: relative;
        z-index: 2;
    }

    .panel-logo {
        font-family: 'DM Serif Display', serif;
        font-size: 1.4rem;
        color: #fff;
        margin-bottom: 3rem;
        letter-spacing: -0.01em;
    }

    .panel-logo span {
        opacity: 0.7;
    }

    .panel-quote {
        font-family: 'DM Serif Display', serif;
        font-size: 1.9rem;
        line-height: 1.2;
        color: #fff;
        margin-bottom: 1rem;
        font-style: italic;
    }

    .panel-sub {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.65);
        line-height: 1.6;
        max-width: 280px;
    }

    /* Panel derecho — formulario */
    .login-panel-right {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem 1.5rem;
    }

    .login-box {
        width: 100%;
        max-width: 400px;
        animation: fadeUp 0.45s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .login-header {
        margin-bottom: 2.25rem;
    }

    .login-eyebrow {
        font-size: 0.72rem;
        font-weight: 500;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--sage);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }
    .login-eyebrow::before {
        content: '';
        display: block;
        width: 20px; height: 1px;
        background: var(--sage);
    }

    .login-title {
        font-family: 'DM Serif Display', serif;
        font-size: 2rem;
        letter-spacing: -0.02em;
        color: var(--text-dark);
        line-height: 1.1;
    }

    /* Errores */
    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        margin-bottom: 1.25rem;
        font-size: 0.85rem;
        color: var(--error);
    }
    .alert-error ul { padding-left: 1rem; }

    /* Campos */
    .field-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 0.375rem;
    }

    .field label {
        font-size: 0.8rem;
        font-weight: 500;
        color: var(--text-mid);
        letter-spacing: 0.02em;
    }

    .field input {
        width: 100%;
        padding: 0.7rem 0.9rem;
        border: 1px solid var(--stone);
        border-radius: 8px;
        background: #fff;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.9rem;
        color: var(--text-dark);
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
    }

    .field input::placeholder { color: var(--text-light); }

    .field input:focus {
        border-color: var(--sage);
        box-shadow: 0 0 0 3px rgba(107,143,113,0.12);
    }

    .field input.is-invalid {
        border-color: var(--error);
    }

    .field-error {
        font-size: 0.78rem;
        color: var(--error);
    }

    /* Forgot password */
    .field-row {
        display: flex;
        justify-content: flex-end;
        margin-top: -0.4rem;
        margin-bottom: 0.25rem;
    }

    .link-subtle {
        font-size: 0.8rem;
        color: var(--text-light);
        text-decoration: none;
        transition: color 0.2s;
    }
    .link-subtle:hover { color: var(--sage); }

    /* Remember me */
    .remember-row {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .remember-row input[type="checkbox"] {
        width: 15px; height: 15px;
        accent-color: var(--sage);
        cursor: pointer;
    }

    .remember-row label {
        font-size: 0.83rem;
        color: var(--text-mid);
        cursor: pointer;
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
        margin-bottom: 1.75rem;
    }
    .btn-submit:hover {
        background: var(--sage-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 18px rgba(107,143,113,0.35);
    }
    .btn-submit:active { transform: translateY(0); }

    /* Divisor */
    .divider-text {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
    }

    .divider-text::before,
    .divider-text::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--stone);
    }

    .divider-text span {
        font-size: 0.78rem;
        color: var(--text-light);
        white-space: nowrap;
    }

    /* Social */
    .social-group {
        display: flex;
        flex-direction: column;
        gap: 0.65rem;
        margin-bottom: 2rem;
    }

    .btn-social {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.625rem;
        width: 100%;
        padding: 0.72rem 1rem;
        background: #fff;
        border: 1px solid var(--stone);
        border-radius: 8px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.875rem;
        font-weight: 400;
        color: var(--text-dark);
        text-decoration: none;
        transition: background 0.2s, border-color 0.2s;
    }
    .btn-social:hover {
        background: var(--sage-light);
        border-color: #ccdece;
    }

    .btn-social svg { flex-shrink: 0; }

    /* Register link */
    .register-prompt {
        text-align: center;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .register-prompt a {
        color: var(--sage);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .register-prompt a:hover { color: var(--sage-dark); }

    /* Mobile logo */
    .mobile-logo {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem;
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 2rem;
    }
    .mobile-logo span { color: var(--sage); }

    @media (min-width: 900px) {
        .mobile-logo { display: none; }
    }
</style>

<div class="login-wrap">

    {{-- Panel izquierdo --}}
    <div class="login-panel-left">
        <div class="panel-pattern"></div>
        <div class="panel-circle-1"></div>
        <div class="panel-circle-2"></div>
        <div class="panel-content">
            <div class="panel-logo">Centro<span>Médico</span></div>
            <p class="panel-quote">Tu bienestar es nuestra prioridad.</p>
            <p class="panel-sub">Accede a tu portal para gestionar citas, resultados y el historial de atención de tu familia.</p>
        </div>
    </div>

    {{-- Panel derecho —— formulario --}}
    <div class="login-panel-right">
        <div class="login-box">

            <div class="mobile-logo">Centro<span>Médico</span></div>

            <div class="login-header">
                <p class="login-eyebrow">Portal de pacientes</p>
                <h1 class="login-title">Iniciar sesión</h1>
            </div>

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group">
                    <div class="field">
                        <label for="email">Correo electrónico</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="tu@correo.com"
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                            required
                            autofocus
                        >
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Contraseña</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                            required
                        >
                        @error('password')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="field-row">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link-subtle">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>

                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Recordar sesión</label>
                </div>

                <button type="submit" class="btn-submit">Ingresar</button>
            </form>

            <div class="divider-text"><span>o continuar con</span></div>

            <div class="social-group">
                {{-- Google --}}
                <a href="{{ url('/login/google') }}" class="btn-social">
                    <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Continuar con Google
                </a>

                {{-- GitHub --}}
                <a href="{{ url('/login/github') }}" class="btn-social">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/>
                    </svg>
                    Continuar con GitHub
                </a>
            </div>

            @if (Route::has('register'))
                <p class="register-prompt">
                    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
                </p>
            @endif

        </div>
    </div>

</div>
@endsection