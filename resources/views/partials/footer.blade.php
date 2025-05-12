<footer class="bg-brown text-ivory">
  <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row md:justify-between gap-8">
    
    <div class="space-y-4 md:space-y-2">
      <img src="{{ asset('https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png') }}" alt="Logo" class="h-10">
      <p class="text-sm leading-relaxed">
        Proyecto íntegramente dedicado<br>
        al fomento de la moda vintage<br>
        sostenible
      </p>
    </div>

    <nav class="flex flex-col space-y-2 text-base font-semibold md:text-center mt-12">
      <a href="{{ url('/terms') }}" class="hover:underline">Términos y condiciones</a>
    </nav>

    <div class="flex flex-col items-start md:items-end space-y-3">
      <p class="text-sm">Suscríbete a nuestra newsletter para no perderte nada</p>
      <form action="#" method="POST" class="flex w-full max-w-xs">
        @csrf
        <input
          type="email"
          name="email"
          placeholder="Email"
          class="flex-grow px-4 py-2 rounded-l-full text-brown focus:outline-none"
        >
        <button
          type="submit"
          class="px-4 py-2 rounded-r-full bg-orange font-bold text-brown hover:bg-beige transition"
        >OK</button>
      </form>
      <a href="https://instagram.com/tu_cuenta" target="_blank" class="mt-2">
        <img src="{{ asset('https://download.logo.wine/logo/Instagram/Instagram-Logo.wine.png') }}" alt="Instagram" class="h-10 w-15">
      </a>
    </div>
  </div>

  <div class="border-t border-beige">
    <p class="text-center text-xs py-4">
      &copy; Vintage Catalog {{ date('Y') }}. Todos los derechos reservados.
    </p>
  </div>
</footer>
