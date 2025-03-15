<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Livewire</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
    @livewireStyles
</head>
<body>
    <h1>Livewire está funcionando 🚀</h1>

    @livewire('test-component')

    @livewireScripts
</body>
</html>
