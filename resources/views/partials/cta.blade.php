<section class="text-black py-16 px-4 font-sans">
  <div class="bg-orange px-8 py-12 max-w-7xl mx-auto rounded-tl-br-inverse relative overflow-hidden">
    
    <h2 class="text-2xl md:text-3xl font-semibold tracking-widest text-center mb-8">
      Para contactar con nosotros o mandar aportaciones puede hacerlo rellenando:
    </h2>

    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
      
      <form action="#" method="POST" class="flex-1 max-w-xl w-full space-y-6">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium mb-1">Nombre:</label>
          <input type="text" id="name" name="name" class="w-full rounded-md border border-black px-4 py-2 bg-ivory focus:outline-none" required>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium mb-1">Email:</label>
          <input type="email" id="email" name="email" class="w-full rounded-md border border-black px-4 py-2 bg-ivory focus:outline-none" required>
        </div>

        <div>
          <label for="message" class="block text-sm font-medium mb-1">Mensaje:</label>
          <textarea id="message" name="message" rows="4" class="w-full rounded-md border border-black px-4 py-2 bg-ivory focus:outline-none" required></textarea>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-brown text-ivory px-6 py-2 rounded-full hover:bg-brown/80 transition">
                Enviar
            </button>
        </div>

      </form>

      <div class="flex-1 flex justify-center">
        <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/i5lv5dmbfs70mgc7d5q2.png" alt="Pergamino" class="h-70 mb-6">
      </div>
    </div>

    <p class="mt-8 text-center text-lg italic">
      ¡Tus aportaciones complementan esta comunidad!
    </p>
  </div>
</section>
