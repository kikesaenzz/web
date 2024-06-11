<a href="/" class="btn btn-primary">Ir a la página de inicio</a>

<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('actualizarUsuario', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        @method('POST')
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}">

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}">

        <label for="nombre_usuario">Nombre de Usuario</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}">

        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" value="{{ $usuario->correo }}">

        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena">

        <div>
            <input type="checkbox" id="esAdmin" name="esAdmin" value="1" {{ $usuario->esAdmin ? 'checked' : '' }}>
            <label for="esAdmin">Es administrador</label>
        </div>

        <button type="submit">Actualizar Usuario</button>
    </form>
</div>
