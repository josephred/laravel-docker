<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
</head>
<body>
    <nav>
        <a href="{{ route('tasks.index') }}">Inicio</a>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>
