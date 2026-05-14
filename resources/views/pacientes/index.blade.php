<h1>Pacientes</h1>

<a href="/pacientes/create">Crear paciente</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($pacientes as $paciente)
            <tr>
                <td>{{ $paciente['id'] }}</td>
                <td>{{ $paciente['nombre'] }}</td>
                <td>{{ $paciente['apellido'] }}</td>
                <td>
                    <a href="/pacientes/{{ $paciente['id'] }}/edit">Editar</a>

                    <form action="/pacientes/{{ $paciente['id'] }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay pacientes</td>
            </tr>
        @endforelse
    </tbody>
</table>