<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png" type="image/x-icon">
</head>
<body class="bg-beige text-gray-900 antialiased">

@if(session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4 text-center">
        {{ session('error') }}
    </div>
@endif

@include('partials.header')

<main class="px-6 py-10">
    <h1 class="text-4xl font-serif font-semibold mb-6 text-center">Catálogo de prendas vintage</h1>
    <p class="text-md text-center mb-10 text-gray-700">Explora la colección completa de prendas únicas seleccionadas con mimo.</p>

    <form method="POST" action="{{ route('admin.garments.destroySelected') }}" id="deleteForm">
        @csrf
        @method('DELETE')

        {{-- BOTONES --}}
        <div class="text-center mb-6">
            @if (!empty($deleteMode) && $deleteMode)
                <button type="submit"
                        onclick="return confirm('¿Estás seguro de que quieres eliminar las prendas seleccionadas?')"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Eliminar seleccionadas
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

        {{-- TARJETAS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($garments as $garment)
                <div class="relative bg-[#FDF7F1] border border-[#F1E3D3] rounded-xl p-4 shadow hover:scale-105 transition duration-300 ease-in-out">
                    @if (!empty($deleteMode) && $deleteMode)
                        <input type="checkbox" name="garment_ids[]" value="{{ $garment->id }}"
                               class="absolute top-2 right-2 w-5 h-5 text-red-600">
                    @elseif (!empty($editMode) && $editMode)
                        <input type="checkbox" name="edit_garment_id" value="{{ $garment->id }}"
                               class="absolute top-2 right-2 w-5 h-5 text-blue-600 single-edit-checkbox">
                    @endif

                    <div class="text-center">
                        @php
                            $firstPhoto = $garment->photos->first();
                        @endphp
                        <img src="{{ $firstPhoto ? $firstPhoto->image_url : 'https://via.placeholder.com/120x140?text=Prenda' }}"
                             alt="Imagen de {{ $garment->name }}"
                             class="mx-auto h-32 object-contain mb-2">

                        <h2 class="text-md font-bold italic text-gray-900">{{ $garment->name }}</h2>
                        <p class="text-xs text-gray-800 mt-1">{{ $garment->description }}</p>

                        @if($garment->production_year)
                            <p class="text-xs text-gray-600 mt-2">Año de distribución: {{ $garment->production_year }}</p>
                        @endif

                        @if($garment->used_country)
                            <p class="text-xs text-gray-600">Diseñador: {{ $garment->used_country }}</p>
                        @endif
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

                // Muestra el botón solo si uno está seleccionado
                const selected = document.querySelector('.single-edit-checkbox:checked');
                if (selected) {
                    editBtn.classList.remove('hidden');
                } else {
                    editBtn.classList.add('hidden');
                }
            });
        });
    });

    function redirectToEdit() {
        const selected = document.querySelector('.single-edit-checkbox:checked');
        if (!selected) {
            alert('Por favor, selecciona una prenda para editar.');
            return;
        }

        const id = selected.value;
        const url = "{{ route('admin.garments.edit', '__ID__') }}".replace('__ID__', id);
        window.location.href = url;
    }
</script>
@endif

</body>
</html>
