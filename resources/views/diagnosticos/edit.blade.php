<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Diagnóstico</title>

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

        <h4 class="mb-4">Editar Diagnóstico</h4>

        <form action="/diagnosticos/{{ $diagnostico->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control">{{ $diagnostico->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label>Fecha</label>
                <input type="datetime-local" name="fecha" class="form-control"
                    value="{{ $diagnostico->fecha }}">
            </div>

            <div class="mb-3">
                <label>Paciente</label>
                <select name="paciente_id" class="form-control">
                    @foreach ($pacientes as $p)
                        <option value="{{ $p->id }}"
                            {{ $p->id == $diagnostico->paciente_id ? 'selected' : '' }}>
                            {{ $p->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Médico</label>
                <select name="medico_id" class="form-control">
                    @foreach ($medicos as $m)
                        <option value="{{ $m->id }}"
                            {{ $m->id == $diagnostico->medico_id ? 'selected' : '' }}>
                            {{ $m->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Gravedad</label>
                <input type="text" name="gravedad" class="form-control"
                    value="{{ $diagnostico->gravedad }}">
            </div>

            <div class="mb-3">
                <label>Recomendaciones</label>
                <textarea name="recomendaciones" class="form-control">{{ $diagnostico->recomendaciones }}</textarea>
            </div>

            <div class="mb-3">
                <label>Tipo</label>
                <input type="text" name="tipo_diagnostico" class="form-control"
                    value="{{ $diagnostico->tipo_diagnostico }}">
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="/diagnosticos" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>
</div>

</body>
</html>