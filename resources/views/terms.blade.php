<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Términos y condiciones</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
</head>
<body class="bg-beige text-gray-900 antialiased">

    @include('partials.header')

    <main class="px-6 py-10 max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-12 text-center">Términos y condiciones</h1>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">1. Aceptación de los términos</h2>
            <p class="text-sm leading-relaxed">
                Al acceder y utilizar este sitio web, aceptas cumplir con los presentes Términos y Condiciones y todas las leyes y normativas aplicables. Si no estás de acuerdo con alguno de estos términos, no debes usar este sitio.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">2. Uso del sitio</h2>
            <p class="text-sm leading-relaxed">
                Vintage Catalog es una plataforma dedicada a la exploración de prendas de ropa vintage. Los usuarios pueden navegar por el catálogo, marcar prendas como favoritas y a partir del catálogo público, crear su propio catálogo privado.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">3. Registro de usuarios</h2>
            <p class="text-sm leading-relaxed">
                Para acceder a ciertas funcionalidades del sitio, es necesario registrarse. El usuario se compromete a proporcionar información veraz y a mantenerla actualizada. El mal uso de cuentas o intentos de suplantación conllevarán la suspensión inmediata.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">4. Contenido y propiedad intelectual</h2>
            <p class="text-sm leading-relaxed">
                Todo el contenido publicado en Vintage Catalog (textos, imágenes, diseño, logotipos, etc.) es propiedad del sitio o se utiliza con licencia. No está permitido copiar, reproducir o distribuir sin autorización previa por escrito.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">5. Uso de imágenes</h2>
            <p class="text-sm leading-relaxed">
                Las imágenes de las prendas son administradas por la administración. Al solicitar una subida de una prenda, no se permite la publicación de contenido ofensivo, inapropiado o que infrinja derechos de terceros.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">6. Modificaciones</h2>
            <p class="text-sm leading-relaxed">
                Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. Se recomienda revisar periódicamente esta sección para mantenerse informado de los cambios.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-2">7. Contacto</h2>
            <p class="text-sm leading-relaxed">
                Si tienes preguntas sobre estos términos, puedes contactarnos a través del formulario de <a href="{{ route('contact') }}" class="text-brown underline">contacto</a> en el sitio.
            </p>
        </section>
    </main>

    @include('partials.footer')

</body>
</html>
