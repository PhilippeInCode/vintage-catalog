<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
</head>
<body class="bg-beige text-gray-900 antialiased">

    @include('partials.header')

    <main class="px-6 py-10">
        <h1 class="text-3xl font-bold mb-4">Catálogo</h1>
        <p class="text-lg">Aquí se cargarán las prendas del catálogo.</p>
    </main>

</body>
</html>
