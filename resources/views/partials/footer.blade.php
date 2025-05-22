<footer class="bg-brown text-ivory">
  <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row md:justify-between gap-8">
    
    <div class="space-y-4 md:space-y-2">
      <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" alt="Logo" class="h-15">
      <p class="text-xl leading-relaxed">
        Proyecto íntegramente dedicado<br>
        al fomento de la moda vintage<br>
        sostenible
      </p>
    </div>

    <nav class="flex flex-col space-y-2 text-xl font-semibold md:text-center mt-12">
      <a href="{{ url('/terms') }}" class="hover:underline">Términos y condiciones</a>
    </nav>

    <div class="mt-12 flex flex-col items-start md:items-end space-y-3">
      <p class="text-lg">Suscríbete a nuestra newsletter para no perderte nada</p>
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
      <a href="#" target="_blank" class="mt-2">
        <img src="https://download.logo.wine/logo/Instagram/Instagram-Logo.wine.png" alt="Instagram" class="h-10 w-15">
      </a>
    </div>
  </div>

   <div class="border-t border-beige">
    <p class="text-center text-lg py-4">
      <a href="https://github.com/PhilippeInCode" target="_blank" class="hover:underline font-semibold block">
        @PhilippeInCode
      </a> <br> &copy; Vintage Catalog {{ date('Y') }}. Todos los derechos reservados.</br>
    </p>
  </div>
</footer>
