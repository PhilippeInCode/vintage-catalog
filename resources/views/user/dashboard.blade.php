@extends('layouts.internal')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}. Este es tu panel de usuario.</h1>

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

    <div class="mt-10">
        <h2 class="text-2xl font-bold mb-4 text-brown">Añadir prendas al catálogo</h2>
        <a href="{{ route('request.garment.create') }}"
            class="bg-ivory hover:bg-orange text-brown px-6 py-2 rounded shadow inline-block">
            ➕ Solicitar añadir prenda
        </a>
    </div>

    @if (Auth::user()->garmentRequests()->count())
        <div class="mt-10">
            <h2 class="text-2xl font-bold mb-4 text-brown">Tus solicitudes</h2>
            <ul class="space-y-2">
                @foreach (Auth::user()->garmentRequests as $request)
                    <li class="p-4 bg-white shadow rounded">
                        <div class="flex justify-between items-center">
                            <span><strong>{{ $request->name }}</strong></span>
                            <span
                                class="px-3 py-1 rounded text-sm
                                @if ($request->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($request->status === 'accepted') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-600 mt-2">
                            <p><strong>Fecha de solicitud:</strong> {{ $request->created_at->format('d/m/Y H:i') }}</p>
                            @if($request->responded_at)
                                <p>
                                    <strong>
                                        {{ $request->status === 'accepted' ? 'Fecha de aceptación:' : 'Fecha de rechazo:' }}
                                    </strong>
                                    {{ $request->responded_at->format('d/m/Y H:i') }}
                                </p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
