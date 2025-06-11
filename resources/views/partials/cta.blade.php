<section class="text-black py-16 px-4 font-sans">
  <div class="bg-orange px-8 py-12 max-w-7xl mx-auto rounded-tl-br-inverse relative overflow-hidden" data-aos="zoom-in-up">

    
    <h2 class="text-4xl md:text-5xl font-semibold tracking-widest text-center mb-8">
      Puede ponerse en contacto con nosotros <br>aquí
    </h2>

    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
      
      <form action="#" method="POST" class="flex-1 max-w-xl w-full space-y-6">
        @csrf
        <div>
          <label for="name" class="block text-lg font-medium mb-1">Nombre:</label>
          <input type="text" id="name" name="name" class="w-full rounded-md border border-black px-4 py-2 bg-ivory focus:outline-none" required  placeholder="Tu nombre">
        </div>

        <div>
          <label for="email" class="block text-lg font-medium mb-1">Email:</label>
          <input type="email" id="email" name="email" class="w-full rounded-md border border-black px-4 py-2 bg-ivory focus:outline-none" required  placeholder="Tu email">
        </div>

        <div class="relative text-left">
              <label for="message" class="block text-lg font-medium mb-1">Mensaje:</label>
                  <textarea name="message" id="message" maxlength="500" rows="5"
                      class="w-full px-4 py-2 pr-16 rounded-lg bg-ivory text-gray-900 resize-none focus:outline-none focus:ring-2 focus:ring-brown"
                      oninput="updateCounter()"  placeholder="Tu mensaje"></textarea>
                  <span id="charCount" class="absolute bottom-3 right-3 text-xs text-gray-600 pointer-events-none">0/500</span>
          </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-brown text-ivory px-10 py-5 rounded-full text-xl md:text-2xl hover:bg-brown/80 transition">
                Enviar
            </button>
        </div>

      </form>

      <div class="flex-1 flex justify-center">
        <img src="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041147/i5lv5dmbfs70mgc7d5q2.png" alt="Pergamino" class="h-70 mb-6">
      </div>
    </div>

    <p class="mt-8 text-center text-xl italic">
      ¡Tus aportaciones complementan esta comunidad!
    </p>
  </div>

    <script>
        function updateCounter() {
            const textarea = document.getElementById('message');
            const counter = document.getElementById('charCount');
            counter.textContent = `${textarea.value.length}/500`;
        }
    </script>

</section>
