<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Vintage Catalog') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Header personalizado para usuarios autenticados --}}
    @include('components.internal-header')

    {{-- Contenido dinámico --}}
    <main class="p-4">
        @yield('content')
    </main>

</body>
</html>
