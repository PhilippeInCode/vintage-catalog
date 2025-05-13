<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vintage Catalog - Acceso</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-white text-gray-900 font-sans antialiased">
    <main class="w-full max-w-md">
        @yield('content')
    </main>
</body>
</html>
