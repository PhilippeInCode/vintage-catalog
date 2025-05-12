<header class="bg-brown px-6 py-4 flex items-center justify-between font-sans bg-brown-600 text-ivory">

      <a href="{{ url('/welcome') }}">
        <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" alt="Logo" class="h-10">
      </a>

    <nav class="flex items-center space-x-20">
      <a href="{{ url('/garments') }}" class="hover:underline">Catálogo</a>
      <a href="{{ url('/values') }}"   class="hover:underline">Valores</a>
      <a href="{{ url('/about') }}"   class="hover:underline">Sobre nosotros</a>
      <a href="{{ url('/contact') }}"  class="hover:underline">Contacto</a>
    </nav>
  
    <div class="relative w-1/3 max-w-xs">
      <input
        type="text"
        placeholder="Buscar..."
        class="w-full h-8 pl-4 pr-10 rounded-full bg-beige text-gray-700 placeholder-gray-500 focus:outline-none"
      >
      <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brown" fill="currentColor" viewBox="0 0 20 20">
          <path d="M12.9 14.32a8 8 0 111.414-1.414l5.387 5.387-1.414 1.414-5.387-5.387zM8 14a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
      </button>
    </div>
  
    <div class="flex items-center space-x-4">
      @guest
        <a
          href="{{ route('login') }}"
          class="px-4 py-1 rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
        >Login</a>
        <a
          href="{{ route('register') }}"
          class="px-4 py-1 rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
        >Register</a>
      @else
        <span class="px-4">{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button
            type="submit"
            class="px-4 py-1 rounded-full bg-ivory text-brown border border-brown hover:bg-beige transition"
          >Logout</button>
        </form>
      @endguest
    </div>
  </header>
  