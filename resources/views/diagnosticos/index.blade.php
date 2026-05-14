<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diagnósticos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
        }

        .header-section {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .header-title {
            color: #004a99;
            font-weight: 600;
        }

        .card-table {
            background: white;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #004a99;
            border: none;
        }

        .btn-primary:hover {
            background-color: #003366;
        }
    </style>
</head>

<body>

<header class="header-section">
    <div class="container d-flex justify-content-between">
        <h3 class="header-title">Diagnósticos</h3>
        <a href="/dashboard" class="btn btn-secondary btn-sm">Volver</a>
    </div>
</header>

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h5>Listado de diagnósticos</h5>
        <a href="/diagnosticos/create" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nuevo
        </a>
    </div>

    <div class="card-table">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Gravedad</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($diagnosticos as $d)
                <tr>
                    <td>{{ $d->descripcion }}</td>
                    <td>{{ $d->fecha }}</td>
                    <td>{{ $d->paciente->nombre }}</td>
                    <td>{{ $d->medico->nombre }}</td>
                    <td>
                        <span class="badge bg-warning text-dark">{{ $d->gravedad }}</span>
                    </td>
                    <td>{{ $d->tipo_diagnostico }}</td>
                    <td>
                        <a href="/diagnosticos/{{ $d->id }}/edit" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="/diagnosticos/{{ $d->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay diagnósticos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>