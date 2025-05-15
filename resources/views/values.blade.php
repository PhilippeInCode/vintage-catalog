<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Valores</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
</head>
<body class="bg-beige text-gray-900 antialiased">

    @include('partials.header')

    <main class="px-6 py-10 space-y-12">
        @include('partials.intro-values')
        @include('partials.values-vintage')
        @include('partials.values-style')
        @include('partials.vintage-classics')
        @include('partials.cta-values')
    </main>

    @include('partials.footer')

</body>
</html>
