<!-- resources/views/usuarios/editar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil de Usuario</title>
</head>
<body>
    <h1>Editar Perfil de Usuario</h1>
    <form method="POST" action="/usuarios/actualizar-perfil">
        @csrf
        <label for="nombre_usuario">Nombre de usuario:</label><br>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ $usuario->email }}"><br><br>

        <button type="submit">Actualizar Perfil</button>
    </form>
</body>
</html>
