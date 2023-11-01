<!-- resources/views/usuarios/perfil.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <p>Nombre de usuario: {{ $usuario->nombre_usuario }}</p>
    <p>Email: {{ $usuario->email }}</p>
</body>
</html>
