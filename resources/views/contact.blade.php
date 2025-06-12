<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
</head>
<body class="bg-beige text-gray-900 antialiased">

    @include('partials.header')

    <main class="flex flex-col items-center px-6 py-14 text-center max-w-xl mx-auto">
        <h1 class="text-4xl font-sans font-bold tracking-wide mb-6">CONTACTO</h1>

        <p class="text-md text-gray-800 mb-10 leading-relaxed">
            Para cualquier consulta o contactar con nosotros, puedes hacerlo a través del siguiente formulario
        </p>

        <form action="#" method="POST" class="w-full space-y-6">
            @csrf

            <div class="text-left">
                <label for="name" class="block text-sm font-medium mb-1">Nombre:</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded-full bg-ivory text-gray-900 focus:outline-none focus:ring-2 focus:ring-brown" required>
            </div>

            <div class="text-left">
                <label for="email" class="block text-sm font-medium mb-1">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded-full bg-ivory text-gray-900 focus:outline-none focus:ring-2 focus:ring-brown" required>
            </div>

            <div class="relative text-left">
                <label for="message" class="block text-sm font-medium mb-1">Mensaje:</label>
                    <textarea name="message" id="message" maxlength="500" rows="5"
                        class="w-full px-4 py-2 pr-16 rounded-lg bg-ivory text-gray-900 resize-none focus:outline-none focus:ring-2 focus:ring-brown"
                        oninput="updateCounter()"></textarea>
                    <span id="charCount" class="absolute bottom-3 right-3 text-xs text-gray-600 pointer-events-none">0/500</span>
            </div>

            <div>
                <button type="submit" class="bg-brown text-white px-6 py-2 rounded-full hover:bg-opacity-90 transition duration-300">Enviar</button>
            </div>
        </form>
    </main>

    @include('partials.cursor')

    @include('partials.footer')

</body>
</html>
