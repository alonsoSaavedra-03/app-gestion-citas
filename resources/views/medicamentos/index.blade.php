<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Medicamentos</title>

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

        .table-container {
            background: white;
            border-radius: 16px;
            padding: 20px;
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
        <h3 class="header-title">Medicamentos</h3>
        <a href="/dashboard" class="btn btn-secondary btn-sm">Volver</a>
    </div>
</header>

<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h5>Listado de medicamentos</h5>
        <a href="/medicamentos/create" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nuevo
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Dosis</th>
                    <th>Frecuencia</th>
                    <th>Tratamiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($medicamentos as $m)
                <tr>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->dosis }}</td>
                    <td>{{ $m->frecuencia }}</td>
                    <td>{{ $m->tratamiento->nombre }}</td>
                    <td>
                        <a href="/medicamentos/{{ $m->id }}/edit" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>

                        <form action="/medicamentos/{{ $m->id }}" method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">No hay medicamentos</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>