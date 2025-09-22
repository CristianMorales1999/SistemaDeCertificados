<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Certificados') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50">
    <x-app.header/>

    <main>
        @yield('content')
    </main>

    <div class="fixed bottom-8 right-8 z-50 flex items-center justify-center text-white w-fit">
        <x-certificates.validar-button />
    </div>

    <x-app.footer/>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
