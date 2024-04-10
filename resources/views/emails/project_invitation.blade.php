<!DOCTYPE html>
<html>
<head>
    <title>Invitación al Proyecto</title>
</head>
<body>
    <h1>Has sido invitado al proyecto: {{ $projectName }}</h1>
    <p>{{ $inviterName }} te ha invitado a unirte a su proyecto en nuestra plataforma.</p>
    <!-- Agrega más contenido según sea necesario -->

    <a href="{{ url("/accept-invitation/{$projectId}/{$userId}") }}" style="padding: 10px; background-color: green; color: white; text-decoration: none;">Aceptar Invitación</a>

    <a href="#" style="padding: 10px; background-color: red; color: white; text-decoration: none;">Declinar</a>

</body>
</html>
