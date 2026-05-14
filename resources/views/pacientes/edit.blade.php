<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>

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

        <h4 class="mb-4">Editar Paciente</h4>

        <form action="/pacientes/{{ $paciente->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}">
            </div>

            <div class="mb-3">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{ $paciente->apellido }}">
            </div>

            <div class="mb-3">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control"
                    value="{{ $paciente->fecha_nacimiento }}">
            </div>

            <div class="mb-3">
                <label>Género</label>
                <input type="text" name="genero" class="form-control" value="{{ $paciente->genero }}">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $paciente->telefono }}">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ $paciente->direccion }}">
            </div>

            <div class="mb-3">
                <label>Tipo de sangre</label>
                <input type="text" name="tipo_sangre" class="form-control"
                    value="{{ $paciente->tipo_sangre }}">
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="/pacientes" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>
</div>

</body>
</html>