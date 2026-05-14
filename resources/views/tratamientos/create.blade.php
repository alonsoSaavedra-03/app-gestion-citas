<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tratamiento</title>

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

        <h4 class="mb-4">Crear Tratamiento</h4>

        <form action="/tratamientos" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Duración</label>
                <input type="text" name="duracion" class="form-control">
            </div>

            <div class="mb-3">
                <label>Diagnóstico</label>
                <select name="diagnostico_id" class="form-control">
                    @foreach ($diagnosticos as $d)
                        <option value="{{ $d->id }}">{{ $d->descripcion }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Médico</label>
                <select name="medico_id" class="form-control">
                    @foreach ($medicos as $m)
                        <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control">
            </div>

            <div class="mb-3">
                <label>Frecuencia</label>
                <input type="text" name="frecuencia_administracion" class="form-control">
            </div>

            <button class="btn btn-primary">Guardar</button>
            <a href="/tratamientos" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>
</div>

</body>
</html>