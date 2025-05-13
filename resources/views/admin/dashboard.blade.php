<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Panel de Administrador</h2>
    </x-slot>

    <div class="p-4">
        Hola, {{ Auth::user()->name }}. Este es tu panel de administrador.
    </div>
</x-app-layout>
