<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vintage Catalog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">

</head>
<body class="bg-beige text-gray-900 antialiased">

    @include('partials.header')

    @include('partials.hero')

    @include('partials.vintage')

    @include('partials.values')

    @include('partials.catalog')

    @include('partials.cta')

    @include('partials.footer')

</body>
</html>
