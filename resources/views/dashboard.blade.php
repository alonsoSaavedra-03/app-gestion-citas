<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Clínica - SENATI</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            color: #1a202c;
        }

        .header-section {
            background: #ffffff;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 40px;
        }

        .header-title {
            font-weight: 600;
            color: #004a99;
            margin: 0;
        }

        .module-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            height: 100%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            background-color: #004a99;
        }

        .module-card:hover .module-icon, 
        .module-card:hover .module-name {
            color: #ffffff !important;
        }

        .module-icon {
            font-size: 3.5rem;
            color: #004a99;
            margin-bottom: 20px;
        }

        .module-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: #2d3748;
        }

        /* Botón de cerrar sesión personalizado */
        .btn-logout {
            background-color: #e53e3e;
            color: white;
            border-radius: 8px;
            padding: 8px 20px;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .btn-logout:hover { color: white; background-color: #c53030; }
    </style>
</head>
<body>

<header class="header-section">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class="header-title">CLÍNICA</h2>
        <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">Bienvenido, <strong>{{ Auth::user()->name }}</strong></span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout btn-sm">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</header>

<div class="container mb-5">
    <div class="text-center mb-5">
        <h4 class="text-secondary fw-light">Panel de Administración</h4>
        <hr class="mx-auto" style="width: 50px; border: 2px solid #004a99;">
    </div>

    <div class="row g-4 justify-content-center">
        @php
            $modulos = [
                ['nombre' => 'Pacientes', 'icon' => 'fa-user-injured', 'url' => '/pacientes'],
                ['nombre' => 'Médicos', 'icon' => 'fa-user-doctor', 'url' => '/medicos'],
                ['nombre' => 'Citas', 'icon' => 'fa-calendar-check', 'url' => '/citas'],
                ['nombre' => 'Diagnósticos', 'icon' => 'fa-stethoscope', 'url' => '/diagnosticos'],
                ['nombre' => 'Tratamientos', 'icon' => 'fa-kit-medical', 'url' => '/tratamientos'],
                ['nombre' => 'Medicamentos', 'icon' => 'fa-pills', 'url' => '/medicamentos'],
            ];
        @endphp

        @foreach($modulos as $modulo)
        <div class="col-6 col-md-4 col-lg-4">
            <a href="{{ url($modulo['url']) }}" class="module-card">
                <i class="fa-solid {{ $modulo['icon'] }} module-icon"></i>
                <span class="module-name">{{ $modulo['nombre'] }}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>