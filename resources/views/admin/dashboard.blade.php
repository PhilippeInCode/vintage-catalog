@extends('layouts.internal')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Bienvenido {{ Auth::user()->name }} a tu dashboard</h1>

    <div class="grid grid-cols-2 gap-6 mb-10">
        <a href="{{ route('admin.garments.create') }}"
            class="bg-ivory rounded-lg shadow p-10 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/00e676/plus-math.png" class="h-15 mb-4" alt="Añadir">
            <span class="text-brown font-bold text-2xl">Añadir prenda</span>
        </a>

        <a href="{{ route('garments', ['mode' => 'delete']) }}"
            class="bg-ivory rounded-lg shadow p-10 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/fa314a/delete-sign.png" class="h-15 mb-4" alt="Eliminar">
            <span class="text-brown font-bold text-2xl">Eliminar prenda</span>
        </a>

        <a href="{{ route('garments', ['mode' => 'edit']) }}"
            class="bg-ivory rounded-lg shadow p-10 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/2979ff/edit.png" class="h-15 mb-4" alt="Editar">
            <span class="text-brown font-bold text-2xl">Editar prenda</span>
        </a>

        <a href="{{ route('garments') }}"
            class="bg-ivory rounded-lg shadow p-10 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/2979ff/visible.png" class="h-15 mb-4" alt="Visualizar">
            <span class="text-brown font-bold text-2xl">Visualizar prendas</span>
        </a>
    </div>

    <h2 class="text-2xl font-bold mt-12 mb-4 text-brown">Tus prendas favoritas</h2>

    @if (Auth::user()->likes()->count())
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach (Auth::user()->likes()->with('garment.photos')->get() as $like)
                @php $garment = $like->garment; @endphp
                <div class="bg-[#FDF7F1] border border-[#F1E3D3] rounded-xl p-4 shadow">
                    <img src="{{ $garment->photos->first()->image_url ?? 'https://via.placeholder.com/120x140?text=Prenda' }}"
                        alt="Imagen de {{ $garment->name }}" class="mx-auto h-32 object-contain mb-2">
                    <h3 class="text-md font-bold text-center">{{ $garment->name }}</h3>
                    <form action="{{ route('garments.favorite', $garment->id) }}" method="POST" class="mt-2 text-center">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700">
                            ❌ Quitar de favoritos
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-sm text-gray-700 italic">No tienes prendas marcadas como favoritas.</p>
    @endif

    <h2 class="text-2xl font-bold mt-16 mb-4 text-brown">Peticiones de usuarios</h2>

    @forelse ($requests as $request)
        <div class="bg-white border border-gray-200 rounded p-4 mb-4 shadow">
            <p><strong>{{ $request->name }}</strong> — {{ $request->user->name }}</p>
            <p class="text-sm text-gray-600 mb-2">{{ $request->description ?? 'Sin descripción' }}</p>
            <p class="text-sm text-gray-500">
                <strong>Solicitado:</strong> {{ $request->created_at->format('d/m/Y H:i') }}
            </p>

            @if ($request->responded_at)
                <p class="text-sm text-gray-500">
                    <strong>
                        {{ $request->status === 'accepted' ? 'Aceptado' : 'Rechazado' }}:
                    </strong> {{ $request->responded_at->format('d/m/Y H:i') }}
                </p>
            @endif

            @if ($request->status === 'pending')
                <div class="flex gap-4 mt-2">
                    <form method="POST" action="{{ route('admin.requests.accept', $request->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Aceptar</button>
                    </form>
                    <form method="POST" action="{{ route('admin.requests.reject', $request->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">Rechazar</button>
                    </form>
                </div>
            @else
                <span
                    class="inline-block mt-2 px-3 py-1 rounded text-sm
                    @if ($request->status === 'accepted') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ $request->status === 'accepted' ? 'Aceptada' : 'Denegada' }}
                </span>
            @endif
        </div>
    @empty
        <p class="italic text-sm text-gray-700">No hay peticiones nuevas.</p>
    @endforelse
@endsection
