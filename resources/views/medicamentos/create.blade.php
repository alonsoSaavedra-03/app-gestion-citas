<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Medicamento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f0f2f5; font-family: 'Poppins', sans-serif; }

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
        <h4 class="mb-4">Crear Medicamento</h4>

        <form action="/medicamentos" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Dosis</label>
                <input type="text" name="dosis" class="form-control">
            </div>

            <div class="mb-3">
                <label>Frecuencia</label>
                <input type="text" name="frecuencia" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tratamiento</label>
                <select name="tratamiento_id" class="form-control">
                    @foreach ($tratamientos as $t)
                        <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Guardar</button>
            <a href="/medicamentos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>