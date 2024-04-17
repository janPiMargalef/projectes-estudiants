<!DOCTYPE html>
<html>
<head>
    <title>Solicitud para Unirse al Proyecto</title>
</head>
<body>
    <h1>{{ $requesterEmail }} ha solicitado unirse a tu proyecto "{{ $projectName }}"</h1>
    <p>Para aceptar esta solicitud, haz clic en el siguiente enlace:</p>
    <a href="{{ url('/accept-request/' . $projectId . '/' . $studentId) }}" style="padding: 10px; background-color: green; color: white; text-decoration: none;">Aceptar Solicitud</a>
    <p>O puedes declinar la solicitud:</p>
    <a href="#" style="padding: 10px; background-color: red; color: white; text-decoration: none;">Declinar</a>
</body>
</html>


