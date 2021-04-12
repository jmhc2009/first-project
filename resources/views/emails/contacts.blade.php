<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>

<body>
    <h3>Contacto desde cafperfumes.cl</h3>
    <p><strong>Nombre:</strong> {{ $contacto['name'] }}</p>
    <p><strong>Teléfono:</strong> {{ $contacto['phone'] }}</p>
    <p><strong>Email:</strong> {{ $contacto['email'] }}</p>
    <p><strong>Mensaje:</strong> {{ $contacto['message'] }}</p>

</body>

</html>
