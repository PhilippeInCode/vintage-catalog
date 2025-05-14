<header class="bg-brown px-6 py-4 flex items-center justify-between font-sans bg-brown-600 text-ivory">

    <a href="{{ url('/') }}">
        <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" alt="Logo" class="h-10">
    </a>

    <nav class="flex items-center space-x-20 text-xl">
        <a href="{{ url('/garments') }}" class="hover:underline">Catálogo</a>
        <a href="{{ url('/values') }}" class="hover:underline">Valores</a>
        <a href="{{ url('/about') }}" class="hover:underline">Sobre nosotros</a>
        <a href="{{ url('/contact') }}" class="hover:underline">Contacto</a>
    </nav>

    <div class="flex items-center space-x-4 text-lg">
        @guest
            <a
                href="{{ route('login') }}"
                class="px-4 py-1 rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
            >Iniciar sesión</a>
            <a
                href="{{ route('register') }}"
                class="px-4 py-1 rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
            >Registro</a>
        @else
            <a
                href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                class="px-4 hover:underline"
            >
                {{ Auth::user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="h-10 px-6 flex items-center justify-center rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
                >Cerrar sesión</button>
            </form>
        @endguest
    </div>
</header>
