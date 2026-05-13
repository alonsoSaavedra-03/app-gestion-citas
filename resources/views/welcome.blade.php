<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Clínica') }}</title>
 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=dm-serif-display:400,400i|dm-sans:300,400,500" rel="stylesheet" />
 
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
 
        <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
            :root {
                --cream: #F9F6F0;
                --warm-white: #FDFCFA;
                --stone: #E8E2D9;
                --sage: #6B8F71;
                --sage-dark: #4A6B50;
                --sage-light: #EBF2EC;
                --text-dark: #1C1C1A;
                --text-mid: #5A5750;
                --text-light: #9A9590;
                --accent: #C17B4E;
            }
 
            html, body {
                height: 100%;
                background-color: var(--cream);
                color: var(--text-dark);
                font-family: 'DM Sans', sans-serif;
                font-weight: 300;
                line-height: 1.6;
            }
 
            /* NAV */
            nav {
                position: fixed;
                top: 0; left: 0; right: 0;
                z-index: 100;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 1.25rem 3rem;
                background: rgba(249, 246, 240, 0.85);
                backdrop-filter: blur(12px);
                border-bottom: 1px solid var(--stone);
            }
 
            .nav-logo {
                font-family: 'DM Serif Display', serif;
                font-size: 1.25rem;
                color: var(--text-dark);
                letter-spacing: -0.01em;
            }
 
            .nav-logo span {
                color: var(--sage);
            }
 
            .nav-actions {
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }
 
            .btn-ghost {
                display: inline-block;
                padding: 0.5rem 1.25rem;
                font-family: 'DM Sans', sans-serif;
                font-size: 0.875rem;
                font-weight: 400;
                color: var(--text-mid);
                text-decoration: none;
                border: 1px solid transparent;
                border-radius: 6px;
                transition: all 0.2s ease;
            }
            .btn-ghost:hover {
                color: var(--text-dark);
                border-color: var(--stone);
                background: var(--warm-white);
            }
 
            .btn-primary {
                display: inline-block;
                padding: 0.5rem 1.25rem;
                font-family: 'DM Sans', sans-serif;
                font-size: 0.875rem;
                font-weight: 500;
                color: #fff;
                text-decoration: none;
                background: var(--sage);
                border: 1px solid var(--sage);
                border-radius: 6px;
                transition: all 0.2s ease;
            }
            .btn-primary:hover {
                background: var(--sage-dark);
                border-color: var(--sage-dark);
            }
 
            /* HERO */
            .hero {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 8rem 3rem 5rem;
                max-width: 1100px;
                margin: 0 auto;
            }
 
            .hero-eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.75rem;
                font-weight: 500;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--sage);
                margin-bottom: 1.5rem;
            }
 
            .hero-eyebrow::before {
                content: '';
                display: block;
                width: 24px;
                height: 1px;
                background: var(--sage);
            }
 
            .hero-title {
                font-family: 'DM Serif Display', serif;
                font-size: clamp(2.8rem, 6vw, 5rem);
                line-height: 1.08;
                letter-spacing: -0.02em;
                color: var(--text-dark);
                max-width: 700px;
                margin-bottom: 1.5rem;
            }
 
            .hero-title em {
                font-style: italic;
                color: var(--sage);
            }
 
            .hero-subtitle {
                font-size: 1.05rem;
                color: var(--text-mid);
                max-width: 460px;
                margin-bottom: 2.5rem;
                line-height: 1.7;
            }
 
            .hero-cta-group {
                display: flex;
                align-items: center;
                gap: 1rem;
                flex-wrap: wrap;
            }
 
            .btn-cta {
                display: inline-block;
                padding: 0.875rem 2rem;
                font-family: 'DM Sans', sans-serif;
                font-size: 0.9rem;
                font-weight: 500;
                color: #fff;
                text-decoration: none;
                background: var(--sage);
                border-radius: 8px;
                transition: all 0.2s ease;
                box-shadow: 0 2px 12px rgba(107, 143, 113, 0.3);
            }
            .btn-cta:hover {
                background: var(--sage-dark);
                transform: translateY(-1px);
                box-shadow: 0 4px 20px rgba(107, 143, 113, 0.4);
            }
 
            .hero-note {
                font-size: 0.85rem;
                color: var(--text-light);
            }
 
            /* DIVIDER */
            .divider {
                width: 100%;
                height: 1px;
                background: var(--stone);
                max-width: 1100px;
                margin: 0 auto;
            }
 
            /* SERVICES */
            .services {
                max-width: 1100px;
                margin: 0 auto;
                padding: 5rem 3rem;
            }
 
            .section-label {
                font-size: 0.75rem;
                font-weight: 500;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--text-light);
                margin-bottom: 3rem;
            }
 
            .services-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 1px;
                background: var(--stone);
                border: 1px solid var(--stone);
                border-radius: 12px;
                overflow: hidden;
            }
 
            .service-card {
                background: var(--warm-white);
                padding: 2rem;
                transition: background 0.2s ease;
            }
            .service-card:hover {
                background: var(--sage-light);
            }
 
            .service-icon {
                width: 36px;
                height: 36px;
                background: var(--sage-light);
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                color: var(--sage);
            }
 
            .service-card h3 {
                font-family: 'DM Serif Display', serif;
                font-size: 1.05rem;
                color: var(--text-dark);
                margin-bottom: 0.5rem;
            }
 
            .service-card p {
                font-size: 0.875rem;
                color: var(--text-mid);
                line-height: 1.6;
            }
 
            /* FOOTER BAR */
            .footer-bar {
                border-top: 1px solid var(--stone);
                padding: 1.5rem 3rem;
                max-width: 1100px;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 0.8rem;
                color: var(--text-light);
            }
 
            @media (max-width: 768px) {
                nav { padding: 1rem 1.25rem; }
                .hero { padding: 7rem 1.25rem 4rem; }
                .services { padding: 3rem 1.25rem; }
                .services-grid { grid-template-columns: 1fr; }
                .footer-bar { flex-direction: column; gap: 0.5rem; padding: 1.25rem; }
            }
        </style>
    </head>
    <body>
 
        <!-- NAV -->
        <nav>
            <div class="nav-logo">Vita<span>alia</span></div>
 
            @if (Route::has('login'))
                <div class="nav-actions">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn-ghost">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
 
        <!-- HERO -->
        <section class="hero">
            <div class="hero-eyebrow">Atención médica de confianza</div>
            <h1 class="hero-title">
                Tu salud, en <em>buenas manos</em>
            </h1>
            <p class="hero-subtitle">
                Brindamos atención médica integral con un equipo de especialistas comprometidos con tu bienestar y el de tu familia.
            </p>
            <div class="hero-cta-group">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-cta">Solicitar una cita</a>
                @endif
                <span class="hero-note">Sin esperas · Atención personalizada</span>
            </div>
        </section>
 
        <div class="divider"></div>
 
        <!-- SERVICES -->
        <section class="services">
            <p class="section-label">Nuestros servicios</p>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                    <h3>Medicina General</h3>
                    <p>Consultas y seguimiento para adultos y niños con atención preventiva y diagnóstico oportuno.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                    </div>
                    <h3>Especialidades</h3>
                    <p>Cardiología, dermatología, pediatría y más, con médicos certificados y años de experiencia.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <h3>Citas en Línea</h3>
                    <p>Agenda tu consulta fácilmente desde cualquier dispositivo y recibe recordatorios automáticos.</p>
                </div>
            </div>
        </section>
 
        <!-- FOOTER -->
        <footer>
            <div class="footer-bar">
                <span>© {{ date('Y') }} CentroMédico · Todos los derechos reservados</span>
                <span>Lun–Vie 8am–6pm · (01) 234-5678</span>
            </div>
        </footer>
 
    </body>
</html>
