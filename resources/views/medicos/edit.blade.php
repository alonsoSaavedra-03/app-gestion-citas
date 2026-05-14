<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Médico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="form-card">

        <h4 class="mb-4">Editar Médico</h4>

        <form action="/medicos/{{ $medico->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $medico->nombre }}">
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ $medico->apellido }}">
            </div>

            <div class="mb-3">
                <label>Especialidad</label>
                <input type="text" name="especialidad" class="form-control" value="{{ $medico->especialidad }}">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $medico->telefono }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $medico->email }}">
            </div>

            <div class="mb-3">
                <label>Licencia</label>
                <input type="text" name="licencia" class="form-control" value="{{ $medico->licencia }}">
            </div>

            <div class="mb-3">
                <label>Años de experiencia</label>
                <input type="number" name="anios_experiencia" class="form-control"
                    value="{{ $medico->anios_experiencia }}">
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="/medicos" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>
</div>

</body>
</html>