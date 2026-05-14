<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cita</title>

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

        <h4 class="mb-4">Crear Cita</h4>

        <form action="/citas" method="POST">
            @csrf

            <div class="mb-3">
                <label>Fecha</label>
                <input type="datetime-local" name="fecha" class="form-control">
            </div>

            <div class="mb-3">
                <label>Motivo</label>
                <input type="text" name="motivo" class="form-control">
            </div>

            <div class="mb-3">
                <label>Paciente</label>
                <select name="paciente_id" class="form-control">
                    @foreach ($pacientes as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->nombre }} {{ $p->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Médico</label>
                <select name="medico_id" class="form-control">
                    @foreach ($medicos as $m)
                        <option value="{{ $m->id }}">
                            {{ $m->nombre }} {{ $m->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control">
            </div>

            <div class="mb-3">
                <label>Observaciones</label>
                <textarea name="observaciones" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Sala</label>
                <input type="text" name="sala" class="form-control">
            </div>

            <button class="btn btn-primary">Guardar</button>
            <a href="/citas" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>
</div>

</body>
</html>