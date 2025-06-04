<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $garment->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://res.cloudinary.com/dk1g12n2h/image/upload/v1747037641/ncpuxn9vrfbr0gmdqezy.png"
        type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body class="bg-[#FDF7F1] text-gray-900 antialiased">

    @include('partials.header')

    <div class="mt-6 ml-6">
        <a href="{{ route('garments') }}">
            <img src="{{ asset('https://res.cloudinary.com/dk1g12n2h/image/upload/v1749033966/flecha_co8hjd.png') }}" alt="Volver"
                class="w-15 h-10 hover:scale-110 transition-transform duration-200">
        </a>
    </div>

    <div class="min-h-screen">
        <div class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row gap-10 items-start">

                <div class="md:w-1/2 w-full">
                    <div class="relative overflow-hidden rounded-lg shadow-md bg-white p-2">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($garment->photos as $photo)
                                    <div class="swiper-slide">
                                        <img src="{{ $photo->image_url }}" alt="Foto de {{ $garment->name }}"
                                            class="rounded w-full h-[500px] object-contain">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <h1 class="text-4xl font-bold mb-6">{{ $garment->name }}</h1>
                    <ul class="space-y-3 text-sm leading-6">
                        @if ($garment->description)
                            <li><strong>Descripción:</strong> {{ $garment->description }}</li>
                        @endif
                        @if ($garment->usage_type)
                            <li><strong>Tipo de uso:</strong> {{ $garment->usage_type }}</li>
                        @endif
                        @if ($garment->origin_country)
                            <li><strong>País de origen:</strong> {{ $garment->origin_country }}</li>
                        @endif
                        @if ($garment->used_country)
                            <li><strong>País de uso:</strong> {{ $garment->used_country }}</li>
                        @endif
                        @if ($garment->production_year)
                            <li><strong>Año de producción:</strong> {{ $garment->production_year }}</li>
                        @endif
                        @if ($garment->usage_year)
                            <li><strong>Año de uso:</strong> {{ $garment->usage_year }}</li>
                        @endif
                        @if ($garment->production_period)
                            <li><strong>Periodo de producción:</strong> {{ $garment->production_period }}</li>
                        @endif
                        @if ($garment->materials)
                            <li><strong>Materiales:</strong> {{ $garment->materials }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    </script>
</body>

</html>
