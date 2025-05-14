<header class="bg-brown text-ivory p-4 flex justify-between items-center shadow-md">
    <div class="flex items-center space-x-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
            <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" alt="Logo" class="h-8">
            <span class="text-lg font-semibold">Vintage Catalog</span>
        </a>
        <span class="text-sm bg-beige text-brown px-2 py-1 rounded capitalize">
            {{ Auth::user()->role }}
        </span>
    </div>

    <div class="flex items-center space-x-14 text-xl">
        <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="hover:underline">Panel de control</a>
        <a href="{{ route('profile.edit') }}" class="hover:underline">Perfil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:underline">Cerrar sesión</button>
        </form>
    </div>
</header>
