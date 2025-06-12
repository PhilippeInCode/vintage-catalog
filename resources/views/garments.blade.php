<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-beige text-gray-900 antialiased">

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            });
        });
    </script>
@endif

@include('partials.header')

<section class="relative h-[1500px] w-full bg-cover bg-center flex items-center justify-center text-center"
         style="background-image: url('https://res.cloudinary.com/dk1g12n2h/image/upload/v1747041148/ddrndfndygay6c82jlxd.png');">
    <div class="bg-ivory bg-opacity-50 px-20 py-10 rounded shadow-lg max-w-2xl">
        <h1 class="text-5xl md:text-6xl font-sans font-bold text-gray-900 mb-2">
            Todo comienza<br>con la inspiración
        </h1>
        <p class="mt-6 text-lg md:text-xl text-gray-800">
            Sumérgete en nuestra colección de prendas vintage
        </p>
    </div>
</section>

<main class="px-6 py-10">
    <h1 class="text-4xl font-sans font-semibold mb-6 text-center">Explora nuestra colección de prendas vintage.</h1>

    <form method="POST" action="{{ route('admin.garments.destroySelected') }}" id="deleteForm">
        @csrf
        @method('DELETE')

        <div class="text-center mb-6">
            @if (!empty($deleteMode) && $deleteMode)
                <button type="button"
                        onclick="confirmDelete()"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Eliminar seleccionadas <span id="selected-count">(0)</span>
                </button>
            @endif

            @if (!empty($editMode) && $editMode)
                <button type="button"
                        id="editSelectedBtn"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 hidden"
                        onclick="redirectToEdit()">
                    Modificar prenda seleccionada
                </button>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($garments as $garment)
                <div class="relative bg-[#FDF7F1] border border-[#F1E3D3] rounded-xl p-4 shadow hover:scale-105 transition duration-300 ease-in-out"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                    @if (!empty($deleteMode) && $deleteMode)
                        <input type="checkbox" name="garment_ids[]" value="{{ $garment->id }}"
                               class="absolute top-2 right-2 w-5 h-5 text-red-600 garment-checkbox">
                    @elseif (!empty($editMode) && $editMode)
                        <input type="checkbox" name="edit_garment_id" value="{{ $garment->id }}"
                               class="absolute top-2 right-2 w-5 h-5 text-blue-600 single-edit-checkbox">
                    @endif

                    <div class="text-center">
                        @php $firstPhoto = $garment->photos->first(); @endphp

                        @if (empty($editMode) && empty($deleteMode))
                            <a href="{{ route('garments.show', $garment->id) }}">
                        @endif

                        <img src="{{ $firstPhoto ? $firstPhoto->image_url : 'https://via.placeholder.com/120x140?text=Prenda' }}"
                             alt="Imagen de {{ $garment->name }}"
                             class="mx-auto h-32 object-contain mb-2">

                        @if (empty($editMode) && empty($deleteMode))
                            </a>
                        @endif

                        <h2 class="text-md font-bold italic text-gray-900">{{ $garment->name }}</h2>
                        <p class="text-xs text-gray-800 mt-1">{{ $garment->description }}</p>

                        @if($garment->production_year)
                            <p class="text-xs text-gray-600 mt-2">Año de distribución: {{ $garment->production_year }}</p>
                        @endif

                        @if($garment->used_country)
                            <p class="text-xs text-gray-600">Diseñador: {{ $garment->used_country }}</p>
                        @endif

                        @auth
                            @if (!(Auth::user()->role === 'admin' && (request()->query('mode') === 'edit' || request()->query('mode') === 'delete')))
                                <form action="{{ route('garments.favorite', $garment->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @php
                                        $liked = $garment->likes->contains('user_id', auth()->id());
                                    @endphp
                                    <button type="submit"
                                            class="text-sm font-medium px-3 py-1 rounded
                                               {{ $liked ? 'bg-red-200 text-red-700 hover:bg-red-300' : 'bg-green-200 text-green-700 hover:bg-green-300' }}">
                                        {{ $liked ? 'Quitar de favoritos ❤️' : 'Añadir a favoritos 🤍' }}
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</main>

@if (!empty($editMode) && $editMode)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.single-edit-checkbox');
        const editBtn = document.getElementById('editSelectedBtn');

        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                checkboxes.forEach(other => {
                    if (other !== cb) other.checked = false;
                });

                const selected = document.querySelector('.single-edit-checkbox:checked');
                editBtn.classList.toggle('hidden', !selected);
            });
        });
    });

    function redirectToEdit() {
        const selected = document.querySelector('.single-edit-checkbox:checked');
        const editBtn = document.getElementById('editSelectedBtn');

        if (!selected) {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Por favor, selecciona una prenda para editar.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        const id = selected.value;
        const url = "{{ route('admin.garments.edit', '__ID__') }}".replace('__ID__', id);
        window.location.href = url;
    }
</script>
@endif

@if (!empty($deleteMode) && $deleteMode)
<script>
    function confirmDelete() {
        const selected = document.querySelectorAll('input[name="garment_ids[]"]:checked');

        if (selected.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Nada seleccionado',
                text: 'Debes seleccionar al menos una prenda para eliminar.',
                confirmButtonColor: '#d33'
            });
            return;
        }

        Swal.fire({
            title: '¿Eliminar prendas seleccionadas?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const garmentCheckboxes = document.querySelectorAll('.garment-checkbox');
        const selectedCount = document.getElementById('selected-count');

        garmentCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const count = document.querySelectorAll('.garment-checkbox:checked').length;
                selectedCount.textContent = `(${count})`;
            });
        });
    });
</script>
@endif

    @include('partials.cursor')

    @include('partials.footer')

</body>
</html>
