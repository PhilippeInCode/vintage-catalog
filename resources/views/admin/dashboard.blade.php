@extends('layouts.internal')

@section('content')
    <h1 class="text-xl font-bold mb-6">Bienvenido {{ Auth::user()->name }} a tu dashboard</h1>

    <div class="grid grid-cols-2 gap-6">

        <a href="{{ route('admin.garments.create') }}" class="bg-ivory rounded-lg shadow p-6 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/00e676/plus-math.png" class="h-10 mb-2" alt="Añadir">
            <span class="text-brown font-bold">Añadir prenda</span>
        </a>

        <a href="{{ route('garments', ['mode' => 'delete']) }}" class="bg-ivory rounded-lg shadow p-6 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/fa314a/delete-sign.png" class="h-10 mb-2" alt="Eliminar">
            <span class="text-brown font-bold">Eliminar prenda</span>
        </a>

        <a href="{{ route('garments', ['mode' => 'edit']) }}" class="bg-ivory rounded-lg shadow p-6 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/2979ff/edit.png" class="h-10 mb-2" alt="Editar">
            <span class="text-brown font-bold">Editar prenda</span>
        </a>

        <a href="{{ route('garments') }}" class="bg-ivory rounded-lg shadow p-6 flex flex-col items-center hover:bg-orange transition">
            <img src="https://img.icons8.com/ios-filled/50/2979ff/visible.png" class="h-10 mb-2" alt="Visualizar">
            <span class="text-brown font-bold">Visualizar prendas</span>
        </a>
    </div>
@endsection
