<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="/" class="btn btn-primary">Ir a la página de inicio</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Experiencia</th>
                <th>Administrador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->experiencia }}</td>
                    <td>{{ $usuario->esAdmin ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('editarUsuario', ['id' => $usuario->id]) }}" class="btn btn-primary">Editar</a>
                        
                        <form action="{{ route('eliminarUsuario', ['id' => $usuario->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
